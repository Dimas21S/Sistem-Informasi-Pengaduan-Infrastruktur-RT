<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});
Route::get('/daftar-laporan', function () {
    return view('daftar-laporan');
});
Route::get('/profil', function () {
    return view('profil');
});
