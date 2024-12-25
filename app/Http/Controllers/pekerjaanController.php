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
        $pekerjaan = Pekerjaan::all(); // Retrieve all pekerjaan records from the database
        return view('pekerjaan.index', compact('pekerjaan')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pass the list of 'proyek' to the view
        $proyek = Proyek::all();
        return view('pekerjaan.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'NAMA' => 'required|string',
        'KATEGORI' => 'required|string',
        'TANGGAL' => 'required|date',
    ]);

    // Create a new Pekerjaan record
    Pekerjaan::create([
        'NAMA' => $request->NAMA,
        'KATEGORI' => $request->KATEGORI,
        'TANGGAL' => $request->TANGGAL,
        'TANGGAL_MULAI' => now(),  // Set to current date if not provided
        'STATUS' => 'Dalam Proses', // Set default status
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan added successfully.');
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
        $workloadList = Standard::all(); // Fetch the standards for the workload list

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

    public function finish(Request $request, $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);

        // Validate input
        $request->validate([
            'tanggal_selesai' => 'required|date',
        ]);

        // Update pekerjaan
        $pekerjaan->TANGGAL_SELESAI = $request->tanggal_selesai;
        $pekerjaan->STATUS = 'Selesai';
        $pekerjaan->save();

        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan berhasil diselesaikan.');
    }

}
