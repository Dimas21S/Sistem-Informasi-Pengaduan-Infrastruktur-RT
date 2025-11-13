<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

Route::get('/daftar-laporan', function () {
    return view('daftar-laporan');
})->name('daftar-laporan');


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'getLogin')->name('login');
    Route::post('/login', 'postLogin')->name('login.post');
    Route::get('/register', 'getRegister')->name('register');
    Route::post('/register', 'postRegister')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/daftar-laporan', 'showLaporan')->name('daftar-laporan');
    Route::get('/detail-laporan/{id_laporan}', 'getDetailLaporan')->name('get-detail-laporan');
    Route::get('/form-laporan', 'getFormLaporan')->name('form-laporan');
    Route::post('/form-laporan', 'postLaporan')->name('form-laporan.post');
    Route::get('/edit-laporan/{id}', 'getEditLaporan')->name('edit-laporan');
    Route::post('/edit-laporan/{id}', 'postEditLaporan')->name('edit-laporan.post');
    Route::post('/delete-laporan/{id}', 'postDeleteLaporan')->name('delete-laporan.post');
    Route::get('/verifikasi-laporan', 'getStatusLaporan')->name('get-verifikasi');
    Route::put('/verifikasi-laporan', 'postStatusLaporan')->name('post-verifikasi');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profil', 'getProfile')->name('profil');
    Route::get('/', 'getLandingPage')->name('landing-page');
    Route::get('/warga/dashboard', 'getBerandaWarga')->name('warga.dashboard');
    Route::get('/petugas/dashboard', 'getDashboardPetugas')->name('petugas.dashboard');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/warga-role', 'getWargaRole')->name('get-role');
    Route::put('/warga-role', 'postWargaRole')->name('post-role');
});