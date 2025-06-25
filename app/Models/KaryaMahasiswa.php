<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KaryaMahasiswa extends Model
{
    protected $table = 'karya_mahasiswa';

    protected $fillable = ['judul', 'slug', 'thumbnail', 'isi', 'tahun', 'kategori_id'];

    // Tambahkan properti ini untuk UUID
    public $incrementing = false; // Memberi tahu Eloquent bahwa ID bukan auto-incrementing
    protected $keyType = 'string'; // Memberi tahu Eloquent bahwa tipe key adalah string (UUID)

    protected static function boot()
    {
        parent::boot();

        // Otomatis menghasilkan UUID saat membuat model baru
        static::creating(function ($karya) {
            if (empty($karya->{$karya->getKeyName()})) {
                $karya->{$karya->getKeyName()} = (string) Str::uuid();
            }
            $karya->slug = Str::slug($karya->judul); // Pastikan slug juga dibuat
        });

        // Otomatis memperbarui slug saat memperbarui model
        static::updating(function ($karya) {
            $karya->slug = Str::slug($karya->judul);
        });
    }

    public function kategori_karya()
    {
        // Relasi ke model KategoriKarya yang sekarang menggunakan UUID
        return $this->belongsTo(KategoriKarya::class, 'kategori_id', 'id');
    }
}
