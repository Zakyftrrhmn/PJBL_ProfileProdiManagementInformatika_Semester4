<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';

    protected $fillable = [
        'kode_mk',
        'mata_kuliah',
        'bentuk_perkuliahan',
        'sks',
        'rps',
        'semester',
    ];
}
