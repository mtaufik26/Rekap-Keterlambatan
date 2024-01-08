<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombels;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function index(){
    //     return view('dashboard'); // Mengembalikan halaman dashboard
    // }

    public function dashboard(){
        $rayon = Rayon::count();
        $user = User::count();
        $rombel = Rombels::count();
        $siswa = Siswa::count();
        return view('dashboard', compact('rayon', 'rombel', 'user', 'siswa'));
    }
}
