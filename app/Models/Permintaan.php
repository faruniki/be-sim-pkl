<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $fillable = [
        'name',
        'jabatan',
        'pt',
        'alamat',
        'pic',
        'kontak_pic',
        'email',
        'kebutuhan',
    ];
}
