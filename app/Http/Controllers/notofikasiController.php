<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Proyek;
use Illuminate\Http\Request;

class notofikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data notifikasi
        $notifikasi = Notifikasi::all();
        return view('notifikasi.index', compact('notifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $proyekList = Proyek::all(); // Mengambil semua proyek dari database

    return view('notifikasi.create', compact('proyekList'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'ID_PROYEK' => 'required|exists:proyek,ID_PROYEK', // Pastikan ini sesuai
            'JUDUL' => 'required|string|max:255',
            'DESKRIPSI' => 'required',
            'TANGGAL' => 'required|date_format:Y-m-d|date', // Validasi format tanggal
            'PRIORITAS' => 'required|in:rendah,sedang,tinggi',
        ]);        
    
        // Cek data yang diterima
        dd($request->all());
    
        // Membuat notifikasi baru
        Notifikasi::create($request->all());
    
        // Redirect setelah berhasil menyimpan
        return redirect()->route('notifikasi.index')->with('success', 'Notifikasi berhasil ditambahkan');
    }       

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menampilkan detail notifikasi berdasarkan ID
        $notifikasi = Notifikasi::findOrFail($id);
        return view('notifikasi.show', compact('notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $proyekList = Proyek::all(); // Mengambil semua proyek dari database
    
        return view('notifikasi.edit', compact('notifikasi', 'proyekList'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'ID_PROYEK' => 'required|exists:proyek,id',
            'JUDUL' => 'required|string|max:255',
            'DESKRIPSI' => 'required',
            'TANGGAL' => 'required|date',
            'PRIORITAS' => 'required|in:rendah,sedang,tinggi',
        ]);

        // Mengupdate data notifikasi berdasarkan ID
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->update($request->all());

        // Redirect setelah berhasil di-update
        return redirect()->route('notifikasi.index')->with('success', 'Notifikasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus notifikasi berdasarkan ID
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->delete();

        // Redirect setelah berhasil dihapus
        return redirect()->route('notifikasi.index')->with('success', 'Notifikasi berhasil dihapus');
    }
}
