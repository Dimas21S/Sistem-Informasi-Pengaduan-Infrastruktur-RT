<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Enums\UserRole as Role;
use App\Models\User;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function getLogin()
    {
        return view('auth.login');
    }

    // Fungsi untuk menampilkan halaman register
    public function getRegister()
    {
        return view('auth.register');
    }

    // Fungsi untuk login user
    public function postLogin(Request $request)
    {
        // Validasi input
        $validasi = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $message = [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!'
        ];

        $request->validate($validasi, $message);

        // Cek kredensial user
        if (Auth::attempt(($request->only('email', 'password')))) {
            $request->session()->regenerate();

            if (Auth::user()->role === Role::Warga) {
                return redirect()->intended(route('warga.dashboard'))->with('success', 'Login berhasil!');

            } elseif (Auth::user()->role === Role::Petugas) {
                return redirect()->intended(route('petugas.dashboard'))->with('success', 'Login berhasil!');

            } elseif (Auth::user()->role === Role::Admin) {
                return redirect()->intended(route('warga.dashboard'))->with('success', 'Login berhasil!');
            }

        return redirect()->back()->with('error', 'Email atau Password salah!');
        }
    }

    // Fungsi untuk register user
    public function postRegister(Request $request)
    {
        // Validasi input
        $validasi = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ];

        $message = [
            'name.required' => 'Nama wajib diisi!',
            'name.string' => 'Nama harus berupa teks!',
            'name.max' => 'Nama maksimal 255 karakter!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
        ];

        $request->validate($validasi, $message);

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => Role::Warga // Set role default sebagai Warga
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Fungsi untuk logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
