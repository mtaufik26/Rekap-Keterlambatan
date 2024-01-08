<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Users;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->latest()->get();
        return view('rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Users::all();
        return view('rayons.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'rayon' => 'required',
        'user_id' => 'required' 
    ]);

    Rayon::create([
        'rayon' => $request->rayon,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('rayons.index')->with('success', 'Rayon berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon, $id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('rayons.show', compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = Users::all();
        $rayon = Rayon::findOrFail($id);
        return view('rayons.edit', compact('rayon', 'users'));
    }     
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rayon = Rayon::findOrFail($id);
        $rayon->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        return redirect()->route('rayons.index')->with('success', 'Siswa berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Rayon::where('id', $id)->delete();
        
        return redirect()->route('rayons.index')->with('success', 'Rombel berhasil dihapus.');
    }
}
