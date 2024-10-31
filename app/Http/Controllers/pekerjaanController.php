<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Proyek;
use App\Models\Standard;
use App\Models\Aktivitas;
use Illuminate\Http\Request;

class pekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::with(['proyek', 'grafik'])->get();
        $workloadList = Standard::all();

        return view('pekerjaan.index', compact('pekerjaan', 'workloadList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyekList = Proyek::all();
        $grafikList = Standard::all();
        return view('pekerjaan.create', compact('proyekList', 'grafikList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_PROYEK' => 'required',
            'ID_GRAFIK' => 'required',
            'NAMA' => 'required|string',
            'STATUS' => 'required|in:selesai,dalam proses',
            'KATEGORI' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);
    
        $pekerjaan = new Pekerjaan();
        $pekerjaan->ID_PROYEK = $request->ID_PROYEK;
        $pekerjaan->ID_GRAFIK = $request->ID_GRAFIK;
        $pekerjaan->NAMA = $request->NAMA;
        $pekerjaan->STATUS = $request->STATUS;
        $pekerjaan->KATEGORI = $request->KATEGORI;
        $pekerjaan->TANGGAL_MULAI = $request->tanggal_mulai;
        $pekerjaan->TANGGAL_SELESAI = $request->tanggal_selesai;
        $pekerjaan->save();
    
        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil disimpan');
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
        $workloadList = Standard::all();
        return view('pekerjaan.edit', compact('pekerjaan', 'proyekList', 'workloadList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_GRAFIK' => 'required|exists:standard,ID_GRAFIK',
            'ID_PROYEK' => 'required|exists:proyek,ID_PROYEK',
            'NAMA' => 'required|string|max:255',
            'STATUS' => 'required|string|max:50',
            'KATEGORI' => 'required|string|max:100',
            'TANGGAL_MULAI' => 'required|date',
            'TANGGAL_SELESAI' => 'required|date',
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
        
        // Delete related records in aktivitas table
        Aktivitas::where('ID_PEKERJAAN', $id)->delete();

        // Now delete pekerjaan
        $pekerjaan->delete();
        
        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil dihapus');
    }
}