<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function index()
    {
        $data = Standard::all();
        return view('standard.index', compact('data'));
    }

    public function create()
    {
        return view('standard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'standard' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|in:Aktif,Tidak Aktif'
        ]);

        if ($request->status == 'Aktif') {
            // Set all other entries to "Tidak Aktif"
            Standard::where('STATUS', 'Aktif')->update(['STATUS' => 'Tidak Aktif']);
        }

        Standard::create($request->all());

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.show', compact('standard'));
    }

    public function edit($id)
    {
        $standard = Standard::findOrFail($id);
        return view('standard.edit', compact('standard'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'standard' => 'required|numeric',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'nullable|date',
        'status' => 'required|in:Aktif,Tidak Aktif'
    ]);

    $standard = Standard::findOrFail($id);

    if ($request->status == 'Aktif') {
        // Set all other entries to "Tidak Aktif"
        Standard::where('STATUS', 'Aktif')
            ->where('ID_GRAFIK', '!=', $id)
            ->update(['STATUS' => 'Tidak Aktif']);
    }

    // Update current instance's status directly and save
    $standard->STATUS = $request->status;
    $standard->STANDARD = $request->standard;
    $standard->TANGGAL_MULAI = $request->tanggal_mulai;
    $standard->TANGGAL_SELESAI = $request->tanggal_selesai;
    $standard->save();

    return redirect()->route('standard.index')->with('success', 'Standard Berhasil Diupdate');
}

    public function destroy($id)
    {
        $standard = Standard::findOrFail($id);
        $standard->delete();

        return redirect()->route('standard.index')->with('success', 'Standard Berhasil Dihapus');
    }
}