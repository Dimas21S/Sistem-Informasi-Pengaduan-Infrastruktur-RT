<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/daftar-laporan', function () {
    return view('daftar-laporan');
})->name('daftar-laporan');
Route::get('/profil', function () {
    return view('profil');
})->name('profil');
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
