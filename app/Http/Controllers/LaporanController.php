<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;

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
        $validasi = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];

        $message = [
            'title.required' => 'Judul laporan wajib diisi!',
            'title.string' => 'Judul laporan harus berupa teks!',
            'title.max' => 'Judul laporan maksimal 255 karakter!',
            'content.required' => 'Isi laporan wajib diisi!',
            'content.string' => 'Isi laporan harus berupa teks!',
        ];

        $request->validate($validasi, $message);

        $report = new Report();
        $report->title = $request->input('title');
        $report->content = $request->input('content');
        $report->save();

        return redirect()->route('daftar-laporan')->with('success', 'Laporan berhasil dibuat.');
    }
}