<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Standard::all(); // Mengambil semua data dari tabel workload_analysis
        return view('standard.index', compact('data')); // Ganti dengan view yang sesuai
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('standard.create'); // Tampilkan form untuk menambah Standard
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        $standard = new Standard();
        $standard->standard = $request->get('standard');
        $standard->tanggal_mulai = $request->get('tanggal_mulai');
        $standard->tanggal_selesai = $request->get('tanggal_selesai');
        $standard->status = $request->get('status');
        $standard->save();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.show', compact('standard')); // Tampilkan detail Standard
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.edit', compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        $standard = new Standard();
        $standard->standard = $request->get('standard');
        $standard->tanggal_mulai = $request->get('tanggal_mulai');
        $standard->tanggal_selesai = $request->get('tanggal_selesai');
        $standard->status = $request->get('status');
        $standard->save();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $standard = Standard::findOrFail($id);
        $standard->delete();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Dihapus');
    }
}
