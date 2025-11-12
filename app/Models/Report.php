<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';          // Nama tabel
    protected $primaryKey = 'id_laporan';  // Kolom primary key yang kamu pakai
    public $incrementing = true;           // Karena kamu pakai $table->id()
    protected $keyType = 'int'; 
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
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->bulan_laporan = now()->startOfMonth(); 
        });
    }
}
