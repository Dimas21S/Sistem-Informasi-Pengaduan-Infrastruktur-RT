<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PengurusController extends Controller
{
    //
    public function getAllUsers()
    {
        $users = User::all();
        return view('pengurus.data-warga', compact('users'));
    }
}
