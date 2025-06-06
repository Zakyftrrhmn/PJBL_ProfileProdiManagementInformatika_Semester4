<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $fillable = ['judul', 'thumbnail', 'slug', 'user_id', 'isi', 'kategori_id'];

    protected static function booted()
    {
        static::creating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });

        static::updating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
