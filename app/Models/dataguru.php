<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataguru extends Model
{
    use HasFactory;
    protected $table = 'dataguru';
    protected $primaryKey ='id_dataguru';
    protected $fillable = [
        'nama_guru',
        'nip',
        'no_hp',
        'jabatan',
        'alamat',
        'foto'
    ];
}
