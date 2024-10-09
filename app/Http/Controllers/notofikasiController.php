<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // dd($request->all()); <-- lek pengen diaktifno tak cek e gpt neh
    
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
            // 'ID_PROYEK' => 'required|exists:proyek,id',
            'ID_PROYEK' => 'required|exists:proyek,ID_PROYEK',
            'JUDUL' => 'required|string|max:255',
            'DESKRIPSI' => 'required',
            'TANGGAL' => 'required|date',
            'PRIORITAS' => 'required|in:rendah,sedang,tinggi',
        ]);

        // Mengupdate data notifikasi berdasarkan ID
        $notifikasi = Notifikasi::findOrFail($id);
        
        // Log the current state before the update
        //Log::info('Notifikasi before update: ', $notifikasi->toArray());

        $notifikasi->update($request->all());

        // Log the state after the update
        //Log::info('Notifikasi after update: ', $notifikasi->fresh()->toArray());

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
