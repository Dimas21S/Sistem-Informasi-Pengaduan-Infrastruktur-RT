<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

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
