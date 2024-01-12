<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Lates;
use Illuminate\Http\Request;
use App\Models\Siswa;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Lates::with('siswa')->get();
        $isLates = Lates::select('student_id', DB::raw('COUNT(*) as late_count'))
            ->groupBy('student_id')
            ->having('late_count', '>', 2)
            ->get();

        return view('lates.index', compact('lates', 'isLates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lates = Siswa::all();
        return view('lates.create', compact('lates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'date_time_late' => 'required',
        'information' => 'required',
        'bukti' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $bukti = $request->file('bukti');
    $bukti->storeAs('public/bukti', $bukti->hashName());

    Lates::create([
        'student_id' => $request->student_id,
        'date_time_late' => $request->date_time_late,
        'information' => $request->information,
        'bukti' => $bukti->hashName(),
    ]);
    return redirect()->route( 'lates.index')->with('success', 'Berhasil menambahkan data!');
}
    public function edit($id)
    {
        $students = Siswa::all();
        $late = Lates::find($id);
        // or $late = late::where('id',$id)->first()

        return view('lates.edit', compact('late', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required ',
            'date_time_late' => 'required|date',
            'information' => 'required',
            'bukti' => 'required|image|file',
    ]);

    $request->validate([
        'student_id' => 'required',
        'date_time_late' => 'required',
        'information' => 'required',
        'bukti' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
    ]);    

        return redirect()->route('lates.index')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        Lates::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }

    public function detail($id)
    {
        $keterlambatanSiswa = Lates::where('student_id', $id)
            ->with('siswa')
            ->orderBy('created_at', 'asc')
            ->get();

        $total_keterlambatan = $keterlambatanSiswa->count();
        $student = $keterlambatanSiswa->first()->siswa;

        return view('lates.detail', compact('keterlambatanSiswa', 'total_keterlambatan', 'student'));
    }
}
