<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        
        if ($warga->id == Auth::id()) {
            return back()->with('error', 'Anda tidak dapat mengubah role Anda sendiri.');
        }

        $warga->update(['role' => $request->role]);

        return back()->with('success', 'Role berhasil diubah');
    }
}
