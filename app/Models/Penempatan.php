<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penempatan extends Model
{
    use HasFactory;
    protected $table = 'penempatan';
    protected $fillable = [
        'nis',
        'name',
        'rayon',
        'rombel',
        'industri',
        'pemetaan',
        'pembimbing',
        'kontak_pic',
        'keterangan',
    ];
}
