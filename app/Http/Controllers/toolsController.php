<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tools;

class toolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tools::all();
        return view('tools.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'tanggal' => 'required|date',
        ]);

        $data = new Tools();
        $data->NAMA = $request->get('nama');
        $data->STATUS = $request->get('status');
        $data->TANGGAL = $request->get('tanggal');
        $data->save();

        return redirect()->route('tools.index')->with('success', 'Tools Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tools $tool)
    {
        return view('tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tools $tool)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'tanggal' => 'required|date',
        ]);
    
        $tool->NAMA = $request->get('nama');
        $tool->STATUS = $request->get('status');
        $tool->TANGGAL = $request->get('tanggal');
        $tool->save();
        
        return redirect()->route('tools.index')->with('success', 'Tools Berhasil Diupdate');
    }    

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Tools $tool)
    {
    $tool->delete();
    return redirect()->route('tools.index')->with('success', 'Tools Berhasil Dihapus');
}
}