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
        // Ambil Standard Aktif terbaru
        $latestActiveStandard = Standard::where('STATUS', 'Aktif')
            ->orderBy('TANGGAL_MULAI', 'desc')
            ->first();

        return view('standard.create', compact('latestActiveStandard'));
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
        'tanggal_selesai' => [
            'required',
            'date',
            'after_or_equal:tanggal_mulai',
            function ($attribute, $value, $fail) use ($request) {
                // Periksa konflik rentang tanggal
                $conflictingStandard = Standard::where(function ($query) use ($value, $request) {
                    $query->whereBetween('TANGGAL_MULAI', [$request->tanggal_mulai, $value])
                          ->orWhereBetween('TANGGAL_SELESAI', [$request->tanggal_mulai, $value])
                          ->orWhere(function ($query) use ($request, $value) {
                              $query->where('TANGGAL_MULAI', '<=', $request->tanggal_mulai)
                                    ->where('TANGGAL_SELESAI', '>=', $value);
                          });
                })->first();

                if ($conflictingStandard) {
                    $fail("Tanggal Selesai bertentangan dengan rentang tanggal Standard lainnya (ID: {$conflictingStandard->ID_GRAFIK}).");
                }
            },
        ],
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
        // Temukan Standard berdasarkan ID
        $standard = Standard::findOrFail($id);

        // Ambil Standard Aktif terbaru berdasarkan TANGGAL_MULAI
        $latestActiveStandard = Standard::where('STATUS', 'Aktif')
            ->orderBy('TANGGAL_MULAI', 'desc')
            ->first();

        // Kirim data ke view
        return view('standard.edit', compact('standard', 'latestActiveStandard'));
    }


    public function update(Request $request, $id)
    {
        $standard = Standard::findOrFail($id);

        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => [
                'required',
                'date',
                'after_or_equal:tanggal_mulai',
                function ($attribute, $value, $fail) use ($request, $id) {
                    // Periksa konflik rentang tanggal, kecuali untuk entri ini sendiri
                    $conflictingStandard = Standard::where('ID_GRAFIK', '!=', $id)
                        ->where(function ($query) use ($value, $request) {
                            $query->whereBetween('TANGGAL_MULAI', [$request->tanggal_mulai, $value])
                                  ->orWhereBetween('TANGGAL_SELESAI', [$request->tanggal_mulai, $value])
                                  ->orWhere(function ($query) use ($request, $value) {
                                      $query->where('TANGGAL_MULAI', '<=', $request->tanggal_mulai)
                                            ->where('TANGGAL_SELESAI', '>=', $value);
                                  });
                        })->first();

                    if ($conflictingStandard) {
                        $fail("Tanggal Selesai bertentangan dengan rentang tanggal Standard lainnya (ID: {$conflictingStandard->ID_GRAFIK}).");
                    }
                },
            ],
        ]);

        // Update data
        $standard->update([
            'STANDARD' => $request->standard,
            'TANGGAL_MULAI' => $request->tanggal_mulai,
            'TANGGAL_SELESAI' => $request->tanggal_selesai,
        ]);

        return redirect()->route('standard.index')->with('success', 'Standard berhasil diperbarui!');
    }



    // public function update(Request $request, $id)
    // {
    //     $standard = Standard::findOrFail($id);

    //     $request->validate([
    //         'tanggal_mulai' => [
    //             'required',
    //             'date',
    //             function ($attribute, $value, $fail) use ($standard) {
    //                 // Ambil Standard aktif
    //                 $activeStandard = Standard::where('STATUS', 'Aktif')->first();

    //                 if ($activeStandard && $value < $activeStandard->TANGGAL_MULAI) {
    //                     $fail('Tanggal yang Anda masukkan tidak boleh lebih kecil dari Tanggal Mulai Standard aktif sebelumnya.');
    //                 }
    //             },
    //         ],
    //         'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    //     ], [
    //         'tanggal_mulai.required' => 'Tanggal Mulai harus diisi.',
    //         'tanggal_selesai.required' => 'Tanggal Selesai harus diisi.',
    //         'tanggal_selesai.after_or_equal' => 'Tanggal Selesai harus setelah atau sama dengan Tanggal Mulai.',
    //     ]);

    //     $standard->update($request->all());

    //     return redirect()->route('standard.index')->with('success', 'Standard berhasil diperbarui!');
    // }


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
