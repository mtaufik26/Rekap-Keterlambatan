<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KeterlambatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');


// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/rombels', [RombelsController::class, 'index'])->name('rombels.index');
    Route::get('/rayons', [RayonController::class, 'index'])->name('rayons.index');
    Route::get('/siswas', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/akuns', [AkunController::class, 'index'])->name('akuns.index');
    // Route::get('/keterlambatan', [KeterlambatanController::class, 'index'])->name('keterlambatan.index');

    //Rombel
    Route::resource('rombels', RombelsController::class);

    Route::prefix('/rombels')->name('rombel.')->group(function () {
        Route::get('/rombels', [RombelsController::class, 'index'])->name('index');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('destroy');
    });

    //Rayon
    Route::resource('rayons', RayonController::class);

    Route::prefix('/rayons')->name('rayon.')->group(function () {
        Route::get('/index', [RayonController::class, 'index'])->name('index');
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [RayonController::class, 'destroy'])->name('destroy');
    });
    

    //Siswa
    Route::resource('siswas', SiswaController::class);
    Route::prefix('/siswas')->name('siswa.')->group(function () {
        Route::get('/index', [SiswaController::class, 'index'])->name('index');
        Route::get('/create', [SiswaController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [SiswaController::class, 'edit'])->name('edit');
        Route::post('/store', [SiswaController::class, 'store'])->name('store');
        Route::patch('/{id}/update', [SiswaController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [SiswaController::class, 'destroy'])->name('destroy');
    });
    //Akun
    Route::resource('akuns', AkunController::class);

    Route::prefix('/users')->name('user.')->group(function () {
        Route::get('/', [AkunController::class, 'index'])->name('index');
        Route::patch('/{id}', [AkunController::class, 'update'])->name('update');
        Route::delete('/{id}', [AkunController::class, 'destroy'])->name('destroy');
    });    
    
});


// Route::get('/', [HomeController::class, 'index'])->name('siswa.index');

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');



//Login & Logout
//Login & Register
//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/login', function () {
    return view('logins.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
//Register
Route::get('/register', function () {
    return view('logins.register');
})->name('register');

Route::post('/register', [LoginController::class, 'register'])->name('register.post');


// Route::get('/register', function () {
//     return view('users.register');
// })->name('register');

// Route::get('/login', function () {
//     return view('users.login');
// })->name('login');

// // Route::get('IsLogin', 'LoginController@IsLogin')->name('IsLogin');
// // Route::get('logout', 'LoginController@logout')->name('logout');

// Route::group(['middleware' =>['Auth']], function (){
//     Route::post('/register', [LoginController::class, 'register'])->name('register.post');  
// });


