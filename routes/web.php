<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('beranda');
// })->name('beranda');

Route::get('/daftar-laporan', function () {
    return view('daftar-laporan');
})->name('daftar-laporan');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'getLogin')->name('login');
    Route::post('/login', 'postLogin')->name('login.post');
    Route::get('/register', 'getRegister')->name('register');
    Route::post('/register', 'postRegister')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/beranda', 'viewBeranda')->name('beranda');
    Route::get('/daftar-laporan', 'showLaporan')->name('daftar-laporan');
    Route::get('/detail-laporan/{id}', 'detailLaporan')->name('detail-laporan');
    Route::get('/form-laporan', 'getFormLaporan')->name('form-laporan');
    Route::post('/form-laporan', 'postLaporan')->name('form-laporan.post');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profil', 'getProfile')->name('profil');
    Route::get('/', 'getLandingPage')->name('landing-page');
    Route::get('/warga/dashboard', 'getBerandaWarga')->name('warga.dashboard');
    Route::get('/petugas/dashboard', 'getDashboardPetugas')->name('petugas.dashboard');
});
