<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes; // Tambahkan ini

class Informasi extends Model
{
    use SoftDeletes; // Gunakan SoftDeletes trait jika diperlukan

    protected $table = 'informasi';
    protected $fillable = ['judul', 'thumbnail', 'slug', 'user_id', 'isi', 'kategori_id'];

    // Tambahkan properti ini untuk UUID
    public $incrementing = false; // Memberi tahu Eloquent bahwa ID bukan auto-incrementing
    protected $keyType = 'string'; // Memberi tahu Eloquent bahwa tipe key adalah string (UUID)

    protected static function boot()
    {
        parent::boot();

        // Otomatis menghasilkan UUID saat membuat model baru
        static::creating(function ($informasi) {
            if (empty($informasi->{$informasi->getKeyName()})) {
                $informasi->{$informasi->getKeyName()} = (string) Str::uuid();
            }
            $informasi->slug = Str::slug($informasi->judul); // Pastikan slug juga dibuat
        });

        // Otomatis memperbarui slug saat memperbarui model
        static::updating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });
    }

    public function kategori()
    {
        // Relasi ke model Kategori yang sekarang menggunakan UUID
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function user()
    {
        // Relasi ke model User yang sekarang menggunakan UUID
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
