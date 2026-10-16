<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris'; // Sesuaikan jika nama tabel database kamu 'galeri' atau 'galeris'

    protected $fillable = [
        'judul',
        'gambar',
    ];
}