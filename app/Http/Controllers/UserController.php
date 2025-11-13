<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Report;

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

    // Fungsi untuk menampilkan form edit profil
    public function getEditProfile()
    {
        $user = Auth::user();

        return view('auth.edit-profil', compact('user'));
    }

    // Fungsi untuk menyimpan perubahan edit profil
    public function postEditProfile(Request $request)
    {
        $user = Auth::user();

        $validate = [
            'name' => 'required|string|max:255',
            
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $message = [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama harus berupa teks',
            'foto_profil.image' => 'File yang diunggah harus berupa gambar',
            'foto_profil.mimes' => 'Format foto harus jpeg, png, atau jpg'
        ];

        $request->validate($validate, $message);

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $user->foto_profil = $path;
        }

        $user->update([
            'name' => $request->name,
            'foto_profil' => $user->foto_profil
        ]);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui.');
    }

    // Fungsi untuk menampilkan landing page
    public function getLandingPage()
    {
        return view('landing-page');
    }

    // Fungsi untuk menampilkan beranda warga
    public function getBerandaWarga()
    {
        $reports = Report::all();
        $firstReport = $reports->first();
        $completed = $reports->where('status', 'completed')->count();
        $pending = $reports->where('status', 'pending')->count();
        $progress = $reports->where('status', 'progress')->count();
        return view('beranda', compact('completed', 'pending', 'progress', 'firstReport'));
    }

    // Fungsi untuk menampilkan dashboard petugas
    public function getDashboardPetugas()
    {
        // Ambil jumlah laporan per bulan
        $data = Report::selectRaw('MONTH(tanggal_laporan) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Konversi angka bulan menjadi nama bulan
        $label = $data->map(function ($item) {
            return \Carbon\Carbon::create()->month($item->bulan)->locale('id')->monthName;
        });

        $values = $data->pluck('total');

        // Hitung total berdasarkan status
        $completed = Report::where('status', 'completed')->count();
        $pending   = Report::where('status', 'pending')->count();
        $progress  = Report::where('status', 'progress')->count();

        // Kirim data ke Blade
        return view('pengurus.dashboard', compact('completed', 'pending', 'progress', 'label', 'values', 'data'));
    }

    // Fungsi untuk menampilkan data warga
    public function getDataWarga()
    {
        $users = User::get()->all();
        return view('pengurus.data-warga', compact('users'));
    }
    
}
