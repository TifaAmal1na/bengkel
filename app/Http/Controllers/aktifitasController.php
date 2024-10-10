<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class aktifitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aktivitas = Aktivitas::with('pekerjaan')->get();
        return view('aktivitas.index', compact('aktivitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaanList = Pekerjaan::all(); // Mengambil semua pekerjaan
        return view('aktivitas.create', compact('pekerjaanList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_PEKERJAAN' => 'required|exists:pekerjaan,ID_PEKERJAAN',
            'DESKRIPSI' => 'required|string',
            'TANGGAL' => 'required|date',
            'TANGGAL_SELESAI' => 'required|date',
            //'STATUS' => 'required|string|max:50',
            'STATUS' => 'required|string|in:Selesai,Dalam Proses,Aktif,Menunggu',
        ]);

        Aktivitas::create($request->all());

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil ditambahkan');
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
        $aktivitas = Aktivitas::findOrFail($id);
        $pekerjaanList = Pekerjaan::all(); // Mengambil semua pekerjaan
        return view('aktivitas.edit', compact('aktivitas', 'pekerjaanList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_PEKERJAAN' => 'required|exists:pekerjaan,ID_PEKERJAAN',
            'DESKRIPSI' => 'required|string',
            'TANGGAL' => 'required|date',
            'TANGGAL_SELESAI' => 'required|date',
            //'STATUS' => 'required|string|max:50',
            'STATUS' => 'required|string|in:Selesai,Dalam Proses,Aktif,Menunggu',
        ]);

        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update($request->all());

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil dihapus');
    }
}
