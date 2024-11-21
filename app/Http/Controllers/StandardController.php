<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

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
        // Dapatkan entry dengan kombinasi TANGGAL_MULAI terbaru dan TANGGAL_SELESAI terjauh
        $latestStandard = Standard::orderBy('TANGGAL_MULAI', 'desc')
            ->orderBy('TANGGAL_SELESAI', 'desc')
            ->first();

        // Nonaktifkan semua status
        Standard::where('STATUS', 'Aktif')->update(['STATUS' => 'Tidak Aktif']);

        // Aktifkan standard terbaru jika ada
        if ($latestStandard) {
            $latestStandard->STATUS = 'Aktif';
            $latestStandard->save();
        }
    }



public function store(Request $request)
{
    $request->validate([
        'standard' => 'required|numeric',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'nullable|date',
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
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $standard = Standard::findOrFail($id);

        // Periksa apakah ada perubahan pada data
        $standard->fill([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
        ]);

        // Jika data berubah, simpan dan perbarui status
        if ($standard->isDirty()) {
            $standard->save();
            $this->updateStatus(); // Perbarui status jika ada perubahan
        }

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Diupdate');
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
