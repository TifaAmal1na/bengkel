<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;

class personelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data personel
        $personel = Personel::all();
        return view('personel.index', compact('personel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'NAMA' => 'required|string|max:255',
            'STATUS' => 'required|string|max:50',
            'JUMLAH_PEKERJA' => 'required|integer',
        ]);

        // Membuat personel baru
        Personel::create($request->all());

        // Redirect setelah berhasil menyimpan
        return redirect()->route('personel.index')->with('success', 'Personel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menampilkan detail personel berdasarkan ID
        $personel = Personel::findOrFail($id);
        return view('personel.show', compact('personel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personel = Personel::findOrFail($id);
        return view('personel.edit', compact('personel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'NAMA' => 'required|string|max:255',
            'STATUS' => 'required|string|max:50',
            'JUMLAH_PEKERJA' => 'required|integer',
        ]);

        // Mengupdate data personel berdasarkan ID
        $personel = Personel::findOrFail($id);
        $personel->update($request->all());

        // Redirect setelah berhasil di-update
        return redirect()->route('personel.index')->with('success', 'Personel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus personel berdasarkan ID
        $personel = Personel::findOrFail($id);
        $personel->delete();

        // Redirect setelah berhasil dihapus
        return redirect()->route('personel.index')->with('success', 'Personel berhasil dihapus');
    }
}
