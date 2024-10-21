<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiHadir extends Model
{
    use HasFactory;
    protected $table = 'presensihadir';
    protected $primaryKey ='id_hadir';
    protected $fillable = [
        'id_dataguru',
        'status_kehadiran',
        'waktu_presensi_hari',
        'waktu_presensi_jam',
    ];
}
