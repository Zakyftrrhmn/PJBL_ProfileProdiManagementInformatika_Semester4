<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KaryaMahasiswa extends Model
{
    protected $table = 'karya_mahasiswa';

    protected $fillable = ['judul', 'slug', 'thumbnail', 'isi', 'tahun', 'kategori_id'];

    protected static function booted()
    {
        static::creating(function ($karya) {
            $karya->slug = Str::slug($karya->judul);
        });

        static::updating(function ($karya) {
            $karya->slug = Str::slug($karya->judul);
        });
    }

    public function kategori_karya()
    {
        return $this->belongsTo(KategoriKarya::class, 'kategori_id');
    }
}
