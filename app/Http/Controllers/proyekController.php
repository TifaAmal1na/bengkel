<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\Proyek;

class proyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Proyek::all(); // Mengambil semua data dari tabel proyek
        return view('proyek.index', compact('data')); // Ganti dengan view yang sesuai
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyek.create'); // Ganti dengan view untuk membuat proyek
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:' . implode(',', Proyek::getStatusOptions()), 
            'jumlah_pekerja' => 'required|integer',
            'tanggal_mulai' => 'required|date',
        ]);
    
        $data = new Proyek;
        $data->nama = $request->input('nama');
        $data->status = $request->input('status');
        $data->jumlah_pekerja = $request->input('jumlah_pekerja');
        $data->tanggal_mulai = $request->input('tanggal_mulai');
        $data->save();
    
        return redirect()->route('proyek.index')->with('success', 'Proyek Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.show', compact('proyek')); // Ganti dengan view yang sesuai
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek')); // Ganti dengan view untuk mengedit proyek
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:' . implode(',', Proyek::getStatusOptions()), // Gunakan enum
            'jumlah_pekerja' => 'required|integer',
            'tanggal_mulai' => 'required|date',
        ]);
    
        $data = Proyek::findOrFail($id);
        $data->nama = $request->input('nama');
        $data->status = $request->input('status');
        $data->jumlah_pekerja = $request->input('jumlah_pekerja');
        $data->tanggal_mulai = $request->input('tanggal_mulai');
        $data->save();
    
        return redirect()->route('proyek.index')->with('success', 'Proyek Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    // Hapus notifikasi terkait dengan proyek ini
    Notifikasi::where('ID_PROYEK', $id)->delete();
    
    $proyek = Proyek::findOrFail($id);
    $proyek->delete();

    return redirect()->route('proyek.index')->with('success', 'Proyek Berhasil Dihapus');
    }
}
