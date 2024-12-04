<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StandardController extends Controller
{
    public function index()
    {
        $data = Standard::orderByRaw("FIELD(STATUS, 'Aktif') DESC")
            ->orderBy('TANGGAL_MULAI', 'desc')
            ->paginate(10); // Pagination untuk halaman index
        return view('standard.index', compact('data'));
    }

    public function create()
    {
        return view('standard.create');
    }

    // Fungsi untuk memperbarui status "Aktif" berdasarkan tanggal
public function updateStatus()
{
    // Nonaktifkan semua entri terlebih dahulu
    Standard::query()->update(['STATUS' => 'Tidak Aktif']);

    // Pilih entri terbaru berdasarkan Tahun -> Bulan -> Tanggal
    $latestStandard = Standard::orderByRaw('YEAR(TANGGAL_MULAI) DESC')
        ->orderByRaw('MONTH(TANGGAL_MULAI) DESC')
        ->orderByRaw('DAY(TANGGAL_MULAI) DESC')
        ->first();

    // Tetapkan entri terbaru sebagai "Aktif"
    if ($latestStandard) {
        $latestStandard->update(['STATUS' => 'Aktif']);
    }
}


    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        Standard::create([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
            'STATUS' => 'Tidak Aktif',
        ]);

        $this->updateStatus(); // Perbarui status setelah menyimpan data baru
        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Ditambahkan');
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
        $standard->update([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
        ]);

        $this->updateStatus(); // Perbarui status setelah pembaruan
        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $standard = Standard::findOrFail($id);
        $standard->pekerjaan()->update(['ID_GRAFIK' => null]); // Lepaskan hubungan pekerjaan
        $standard->delete();

        $this->updateStatus(); // Perbarui status setelah penghapusan
        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Dihapus');
    }

    // Mendapatkan data standard yang aktif
    public function getActiveStandards()
    {
        $activeStandards = Standard::where('STATUS', 'Aktif')->get();
        return response()->json($activeStandards);
    }

    // Data untuk grafik
    public function standardChart()
    {
        $activeStandards = Standard::where('STATUS', 'Aktif')->get();
        $chartData = $activeStandards->map(function ($standard) {
            return [
                'start_date' => $standard->TANGGAL_MULAI,
                'end_date' => $standard->TANGGAL_SELESAI,
                'value' => $standard->STANDARD,
            ];
        });

        return response()->json($chartData);
    }
}
