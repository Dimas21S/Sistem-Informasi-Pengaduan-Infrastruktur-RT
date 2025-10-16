<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    // Fungsi untuk menampilkan profil pengguna
    public function getProfile()
    {
        $user = Auth::user();
        $reports = $user->reports;
        $count = $reports->count();
        $completed = $reports->where('status', 'completed')->count();
        $pending = $reports->where('status', 'pending')->count();
        $progress = $reports->where('status', 'progress')->count();

        return view('profil', compact('user', 'count', 'completed', 'pending', 'progress'));
    }

    public function getAllUsers()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    
}
