<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    //fungsi untuk menampilkan daftar laporan
    public function showLaporan()
    {
        $reports = Report::all();
        
        return view('daftar-laporan', compact('reports'));
    }

    //fungsi untuk menampilkan detail laporan
    public function detailLaporan($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
        return view('detail-laporan', compact('report'));
    }

    // Fungsi untuk menampilkan form pembuatan laporan baru
    public function getFormLaporan()
    {
        return view('auth.form-laporan');
    }

    // Fungsi untuk menyimpan laporan baru
    public function postLaporan(Request $request)
    {
        $user = Auth::user();

        $title = 'Laporan ID ' . (Report::max('id_laporan') + 1);
        
        $validasi = [
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ];

        $message = [
            'deskripsi.required' => 'Isi laporan wajib diisi!',
            'deskripsi.string' => 'Isi laporan harus berupa teks!',
            'foto.required' => 'Foto wajib diunggah!',
            'foto.image' => 'File yang diunggah harus berupa gambar!',
            'foto.mimes' => 'Format foto harus jpeg, png, atau jpg!',
            'foto.max' => 'Ukuran foto maksimal 5MB!',
        ];

        $request->validate($validasi, $message);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $nama_file, 'public');
        } else {
            $path = null;
        }

        $report = new Report();
        $report->judul_laporan = $title;
        $report->isi_laporan = $request->input('deskripsi');
        $report->foto_bukti = $path;
        $report->status = 'pending';
        $report->tanggal_laporan = now();
        $report->user_id = $user->id;
        $report->save();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil dibuat.');
    }

    // Fungsi untuk menghapus laporan
    public function deleteLaporan($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        $report->delete();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil dihapus.');
    }

    // Fungsi untuk menampilkan form edit laporan
    public function editLaporan($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
        return view('edit-laporan', compact('report'));
    }

    // Fungsi untuk memperbarui laporan
    public function updateLaporan(Request $request, $id)
    {
        $report = Report::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        $validasi = [
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ];

        $message = [
            'deskripsi.required' => 'Isi laporan wajib diisi!',
            'deskripsi.string' => 'Isi laporan harus berupa teks!',
            'foto.image' => 'File yang diunggah harus berupa gambar!',
            'foto.mimes' => 'Format foto harus jpeg, png, atau jpg!',
            'foto.max' => 'Ukuran foto maksimal 5MB!',
        ];

        $request->validate($validasi, $message);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $nama_file, 'public');
            $report->foto_bukti = $path;
        }

        $report->isi_laporan = $request->input('deskripsi');
        $report->save();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Fungsi untuk menampilkan laporan milik user yang sedang login
    // public function laporanSaya()
    // {
    //     $user = Report::user();
    //     $reports = Report::where('id_user', $user->id())->get();

    //     return view('laporan-saya', compact('reports'));
    // }

    // public function grafikLaporan()
    // {
    //     // Ambil jumlah laporan per bulan
    //     $data = Report::selectRaw('MONTH(tanggal_laporan) as bulan, COUNT(*) as total')
    //         ->groupBy('bulan')
    //         ->orderBy('bulan')
    //         ->get();

    //     // Konversi angka bulan menjadi nama bulan
    //     $label = $data->map(function ($item) {
    //         return \Carbon\Carbon::create()->month($item->bulan)->locale('id')->monthName;
    //     });

    //     $values = $data->pluck('total');

    //     // Hitung total berdasarkan status
    //     $completed = Report::where('status', 'completed')->count();
    //     $pending   = Report::where('status', 'pending')->count();
    //     $progress  = Report::where('status', 'progress')->count();

    //     // Kirim data ke Blade
    //     return view('pengurus.dashboard', compact('completed', 'pending', 'progress', 'label', 'values'));
    // }

}