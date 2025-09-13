<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'judul laporan',
        'isi laporan',
        'foto bukti',
        'status',
        'tanggal laporan'
    ];
}
