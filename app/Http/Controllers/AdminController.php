<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Fungsi untuk menampilkan daftar warga dan role-nya
    public function getWargaRole()
    {
        $warga = User::get()->all();

        return view('pengurus.data-warga', compact('warga'));
    }

    // Fungsi untuk mengubah role warga
    public function postWargaRole(Request $request)
    {
        // dd($request->all());

        $request->validate([
        'id' => 'required|exists:users,id',
        'role' => 'required|in:Warga,Petugas,Admin',
        ]);

        $warga = User::findOrFail($request->id);
        $warga->update(['role' => $request->role]);

        return back()->with('success', 'Role berhasil diubah');
    }
}
