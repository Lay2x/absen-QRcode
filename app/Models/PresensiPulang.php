<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiPulang extends Model
{
    use HasFactory;
    protected $table = 'presensipulang';
    protected $primaryKey ='id_pulang';
    protected $fillable = [
        'id_dataguru',
        'status_kepulangan',
        'waktu_presensi_hari',
        'waktu_presensi_jam',
    ];
}
