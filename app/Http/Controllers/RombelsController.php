<?php

namespace App\Http\Controllers;

use App\Models\Rombels;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombels::all(); 
        return view('rombels.index', compact('rombels')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ]);

        Rombels::create([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombels.index')->with('success', 'Rombel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombels $rombels, $id)
    {
        $rombel = Rombels::findOrFail($id);
        return view('rombels.show', compact('rombel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombels $rombels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Rombels::where('id',$id)
            ->where('id',$id)
                ->update([
                    'rombel' => $request->rombel,
                ]);
        return redirect()->route('rombels.index')->with('success', 'Rombel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Rombels::where('id', $id)->delete();
        
        return redirect()->route('rombels.index')->with('success', 'Rombel berhasil dihapus.');
    }
}
