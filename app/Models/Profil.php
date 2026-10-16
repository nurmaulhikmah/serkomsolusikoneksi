<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';

    protected $fillable = [
        'hero_judul',
        'hero_deskripsi',
        'nama_perusahaan',
        'deskripsi_1',
        'deskripsi_2',
        'visi',
        'misi',
        'stat_1_angka',
        'stat_1_label',
        'stat_2_angka',
        'stat_2_label',
        'stat_3_angka',
        'stat_3_label',
    ];
}