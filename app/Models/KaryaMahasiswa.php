<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaryaMahasiswa extends Model
{
    protected $table = 'karya_mahasiswa';

    protected $fillable = ['judul', 'thumbnail', 'isi', 'tahun', 'kategori_id'];

    public function kategori_karya()
    {
        return $this->belongsTo(KategoriKarya::class, 'kategori_id');
    }
}
