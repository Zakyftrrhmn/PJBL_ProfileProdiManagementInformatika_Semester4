<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKarya extends Model
{
    protected $table = 'kategori_karya';

    protected $fillable = [
        'nama_kategori',
    ];


    public function karya_mahasiswa()
    {
        return $this->hasMany(KaryaMahasiswa::class);
    }
}
