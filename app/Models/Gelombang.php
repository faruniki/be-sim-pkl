<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gelombang extends Model
{
    use HasFactory;

    protected $table = 'gelombang';
    protected $fillable = [
        'nis',
        'name',
        'email',
        'rayon',
        'rombel',
        'pt',
        'priode',
    ];

}
