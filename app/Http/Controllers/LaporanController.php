<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    //fungsi untuk menampilkan daftar laporan
    public function showLaporan(Request $request)
    {
        $reports = Report::paginate(10);
        
        return view('daftar-laporan', compact('reports'));
    }

    //fungsi untuk menampilkan detail laporan
    public function getDetailLaporan($id)
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
    public function postDeleteLaporan($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        if ($report->foto_bukti && Storage::exists($report->foto_bukti)) {
            Storage::delete($report->foto_bukti);
        }

        $report->delete();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil dihapus.');
    }

    // Fungsi untuk menampilkan form edit laporan
    public function getEditLaporan($id)
    {
        // otomatis 404 jika laporan tidak ditemukan
        $report = Report::findOrFail($id);

        // cek apakah user pemilik laporan
        if ($report->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit laporan ini.');
        }

        return view('auth.edit-laporan', compact('report'));
    }


    // Fungsi untuk memperbarui laporan
    public function postEditLaporan(Request $request, $id)
    {
        $report = Report::find($id);

        if (!$report) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        // 🔥 Cegah user mengedit laporan orang lain
        if ($report->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit laporan ini.');
        }

        $request->validate([
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ],[
            'deskripsi.required' => 'Isi laporan wajib diisi!',
            'deskripsi.string'   => 'Isi laporan harus berupa teks!',
            'foto.image'         => 'File harus berupa gambar!',
            'foto.mimes'         => 'Format foto harus jpeg, png, atau jpg!',
            'foto.max'           => 'Ukuran foto maksimal 5MB!',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            // 🔥 Hapus foto lama jika ada
            if ($report->foto_bukti && Storage::disk('public')->exists($report->foto_bukti)) {
                Storage::disk('public')->delete($report->foto_bukti);
            }

            // Upload foto baru
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $nama_file, 'public');

            $report->foto_bukti = $path;
        }

        // Update deskripsi
        $report->isi_laporan = $request->deskripsi;
        $report->save();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Fungsi untuk menampilkan tampilan daftar status laporan
    public function getStatusLaporan()
    {
        $laporan = Report::get()->all();

        return view('pengurus.verifikasi', compact('laporan'));
    }

    public function postStatusLaporan(Request $request)
    {
        $request->validate([
            'id_laporan' => 'required|exists:reports,id_laporan',
            'status' => 'required|in:pending,progress,completed',
        ]);

        $laporan = Report::findOrFail($request->id_laporan);
        
        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->back()->with('success', 'Status laporan telah berhasil diubah');
    }

    public function getSearchLaporan(Request $request)
    {
        // Mulai query dasar
        $reports = Report::query();

        // Filter Search
        if ($request->search) {
            $reports->where(function ($query) use ($request) {
                $query->where('judul_laporan', 'like', '%' . $request->search . '%')
                    ->orWhere('isi_laporan', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Status
        if ($request->status) {
            $reports->where('status', $request->status);
        }

        // Filter Tanggal
        if ($request->sort == 'oldest') {
            $reports->orderBy('created_at', 'asc');
        } elseif ($request->sort == 'title') {
            $reports->orderBy('title', 'asc');
        } else {
            // default newest
            $reports->orderBy('created_at', 'desc');
        }

        // Eksekusi semua filter
        $reports = $reports->paginate(10)->withQueryString();

        return view('daftar-laporan', compact('reports'));
    }


    public function getLaporanUser()
    {
        $user = Auth::user();
        $reports = Report::where('user_id', $user->id)->get();

        return view('auth.laporan-user', compact('reports'));
    }

}