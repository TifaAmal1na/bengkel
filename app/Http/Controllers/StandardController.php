<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class StandardController extends Controller
{
    public function index()
    {
        // Urutkan data: Status "Aktif" di atas, lalu berdasarkan TANGGAL_MULAI secara descending
        $data = Standard::orderByRaw("FIELD(STATUS, 'Aktif') DESC")
            ->orderBy('TANGGAL_MULAI', 'desc')
            ->paginate(10); // Tambahkan pagination

        // Kirim data ke view
        return view('standard.index', compact('data'));
    }


    public function create()
    {
        return view('standard.create');
    }

    // Method untuk menetapkan status berdasarkan tanggal terbaru
    private function updateStatus()
    {
        $now = Carbon::now(); // Mendapatkan waktu sekarang

        // Ambil entri dengan TANGGAL_MULAI yang lebih baru dan TANGGAL_SELESAI masih berlaku atau NULL
        $latestStandard = Standard::whereDate('TANGGAL_MULAI', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereNull('TANGGAL_SELESAI') // Jika TANGGAL_SELESAI kosong
                      ->orWhereDate('TANGGAL_SELESAI', '>=', $now); // Jika TANGGAL_SELESAI masih berlaku
            })
            ->orderBy('TANGGAL_MULAI', 'desc') // Urutkan berdasarkan TANGGAL_MULAI yang lebih terbaru
            ->first();

        // Nonaktifkan semua entri yang statusnya "Aktif"
        Standard::where('STATUS', 'Aktif')->update(['STATUS' => 'Tidak Aktif']);

        // Jika entri valid ditemukan, tandai sebagai "Aktif"
        if ($latestStandard) {
            $latestStandard->STATUS = 'Aktif';
            $latestStandard->save(); // Simpan perubahan status
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai', // Tanggal selesai tidak boleh lebih kecil dari Tanggal Mulai
        ]);

        // Simpan data baru
        $newStandard = Standard::create([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
            'STATUS' => 'Tidak Aktif', // Default sebagai Tidak Aktif
        ]);

        // Perbarui status Aktif berdasarkan tanggal
        $this->updateStatus();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Ditambahkan');
    }

    public function getActiveStandards()
{
    $activeStandards = Standard::where('status', 'Aktif')->get();
    return response()->json($activeStandards); // For API or AJAX use
}

public function standardChart()
{
    $activeStandards = Standard::where('status', 'Aktif')->get();

    // Format the data for the chart
    $chartData = $activeStandards->map(function ($standard) {
        return [
            'start_date' => $standard->TANGGAL_MULAI,
            'end_date' => $standard->TANGGAL_SELESAI,
            'value' => $standard->STANDARD,
        ];
    });

    return response()->json($chartData); // Return for the chart
}


    public function show($id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.show', compact('standard'));
    }

    public function edit($id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.edit', compact('standard'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai', // Tanggal selesai harus lebih besar atau sama dengan tanggal mulai
        ]);

        // Ambil data Standard berdasarkan ID
        $standard = Standard::findOrFail($id);

        // Periksa apakah ada perubahan pada data
        $standard->fill([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
        ]);

        // Jika ada perubahan, simpan data dan update status
        if ($standard->isDirty()) {
            // Panggil fungsi updateStatus() untuk update status Aktif
            $this->updateStatus();

            // Simpan perubahan data Standard
            $standard->save();
        }

        return redirect()->route('standard.index')->with('success', 'Standard berhasil diupdate');
    }


    public function destroy($id)
    {
        $standard = Standard::findOrFail($id);

        // Lepaskan semua referensi di tabel pekerjaan
        $standard->pekerjaan()->update(['ID_GRAFIK' => null]);

        // Hapus data standard
        $standard->delete();

        // Perbarui status ke entri dengan TANGGAL_MULAI terbaru
        $this->updateStatus();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Dihapus');
    }
}
