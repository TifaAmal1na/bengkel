<?php

namespace App\Http\Controllers;

use App\Models\Workload;
use Illuminate\Http\Request;

class workloadAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Workload::all(); // Mengambil semua data dari tabel workload_analysis
        return view('workload_analysis.index', compact('data')); // Ganti dengan view yang sesuai
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workload_analysis.create'); // Tampilkan form untuk menambah workload
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal' => 'required|date',
            'jumlah_pekerjaan' => 'required|integer',
        ]);

        $workload = new Workload();
        $workload->standard = $request->get('standard');
        $workload->tanggal = $request->get('tanggal');
        $workload->jumlah_pekerjaan = $request->get('jumlah_pekerjaan');
        $workload->save();

        return redirect()->route('workload_analysis.index')->with('success', 'Workload Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workload = Workload::findOrFail($id);
        return view('workload_analysis.show', compact('workload')); // Tampilkan detail workload
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workload = Workload::findOrFail($id);
        return view('workload_analysis.edit', compact('workload')); // Tampilkan form untuk edit workload
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal' => 'required|date',
            'jumlah_pekerjaan' => 'required|integer',
        ]);

        $workload = Workload::findOrFail($id);
        $workload->standard = $request->get('standard');
        $workload->tanggal = $request->get('tanggal');
        $workload->jumlah_pekerjaan = $request->get('jumlah_pekerjaan');
        $workload->save();

        return redirect()->route('workload_analysis.index')->with('success', 'Workload Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workload = Workload::findOrFail($id);
        $workload->delete();

        return redirect()->route('workload_analysis.index')->with('success', 'Workload Berhasil Dihapus');
    }
}
