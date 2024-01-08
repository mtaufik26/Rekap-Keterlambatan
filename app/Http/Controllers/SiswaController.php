<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Siswa;
use App\Models\Rombels;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with('rayon','rombel')->latest()->get(); 
        return view('siswas.index', compact('siswas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayon = Rayon::all();
        $rombels = Rombels::all();
        return view('siswas.create',compact('rayon','rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);
    
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
    
        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa, $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $rayon = Rayon::all();
        $rombel = Rombels::all();
        return view('siswas.edit', compact('siswa', 'rayon', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Siswa::where('id', $id)->delete();
        
        return redirect()->route('siswas.index')->with('success', 'Rombel berhasil dihapus.');
    }
}
