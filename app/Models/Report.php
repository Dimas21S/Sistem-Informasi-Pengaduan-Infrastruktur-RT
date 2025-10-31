<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'judul_laporan',
        'isi_laporan',
        'foto_bukti',
        'status',
        'tanggal_laporan',
        'bulan_laporan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->bulan_laporan = now()->startOfMonth(); 
        });
    }
}
