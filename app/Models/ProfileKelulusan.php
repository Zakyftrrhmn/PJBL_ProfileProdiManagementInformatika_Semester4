<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileKelulusan extends Model
{
    protected $table = 'profile_kelulusan';

    protected $fillable =
    [
        'nama_profile',
        'deskripsi',
    ];
}
