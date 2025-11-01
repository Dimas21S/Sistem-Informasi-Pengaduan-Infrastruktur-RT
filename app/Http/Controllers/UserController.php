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

    public function getLandingPage()
    {
        return view('landing-page');
    }

    public function getBerandaWarga()
    {
        $reports = Report::all();
        $firstReport = $reports->first();
        $completed = $reports->where('status', 'completed')->count();
        $pending = $reports->where('status', 'pending')->count();
        $progress = $reports->where('status', 'progress')->count();
        return view('beranda', compact('completed', 'pending', 'progress', 'firstReport'));
    }

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
    
}
