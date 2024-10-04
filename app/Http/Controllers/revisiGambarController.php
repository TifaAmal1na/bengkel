<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Revisi;
use Illuminate\Http\Request;

class revisiGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revisiGambar = Revisi::with('pekerjaan')->get();
        return view('revisi_gambar.index', compact('revisiGambar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaanList = Pekerjaan::all(); // Mengambil semua pekerjaan
        return view('revisi_gambar.create', compact('pekerjaanList'));
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
        ]);

        Revisi::create($request->all());

        return redirect()->route('revisi_gambar.index')->with('success', 'Revisi gambar berhasil ditambahkan');
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
    public function edit($id)
    {
        $revisiGambar = Revisi::findOrFail($id);
        $pekerjaanList = Pekerjaan::all(); // Mengambil semua pekerjaan
        return view('revisi_gambar.edit', compact('revisiGambar', 'pekerjaanList'));
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
        ]);

        $revisiGambar = Revisi::findOrFail($id);
        $revisiGambar->update($request->all());

        return redirect()->route('revisi_gambar.index')->with('success', 'Revisi gambar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $revisiGambar = Revisi::findOrFail($id);
        $revisiGambar->delete();

        return redirect()->route('revisi_gambar.index')->with('success', 'Revisi gambar berhasil dihapus');
    }
}
