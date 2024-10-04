<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Proyek;
use App\Models\Workload;
use Illuminate\Http\Request;

class pekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::with(['proyek', 'grafik'])->get();
        $workloadList = Workload::all();

        return view('pekerjaan.index', compact('pekerjaan', 'workloadList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyekList = Proyek::all(); // Mengambil semua proyek
        $grafikList = Workload::all(); // Mengambil semua grafik
        return view('pekerjaan.create', compact('proyekList', 'grafikList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_GRAFIK' => 'required|exists:grafik,id',
            'ID_PROYEK' => 'required|exists:proyek,id',
            'NAMA' => 'required|string|max:255',
            'STATUS' => 'required|string|max:50',
            'KATEGORI' => 'required|string|max:100',
            'TANGGAL' => 'required|date',
            'JUMLAH' => 'required|integer',
        ]);

        Pekerjaan::create($request->all());
        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $proyekList = Proyek::all();
        $grafikList = Workload::all();
        return view('pekerjaan.edit', compact('pekerjaan', 'proyekList', 'grafikList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_GRAFIK' => 'required|exists:grafik,id',
            'ID_PROYEK' => 'required|exists:proyek,id',
            'NAMA' => 'required|string|max:255',
            'STATUS' => 'required|string|max:50',
            'KATEGORI' => 'required|string|max:100',
            'TANGGAL' => 'required|date',
            'JUMLAH' => 'required|integer',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->update($request->all());
        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil dihapus');
    }
}
