<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable = [
        'nama',
        'asal',
        'komentar',
        'rating',
        'foto',
        'video',
        'tipe_media',
        'aktif',
    ];
}