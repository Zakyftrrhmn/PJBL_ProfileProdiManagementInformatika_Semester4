<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Tambahkan ini
use Illuminate\Support\Str; // Tambahkan ini

class Dosen extends Model
{
    use SoftDeletes; // Gunakan SoftDeletes trait

    protected $table = 'dosen';

    protected $fillable = [
        'photo',
        'username',
        'nama',
        'asal_kota',
        'nidn',
        'website',
        'email',
        'pendidikan',
        'jabatan',
        'kompetensi', // Tambahkan kompetensi ke fillable
    ];

    // Tambahkan properti ini untuk UUID
    public $incrementing = false; // Memberi tahu Eloquent bahwa ID bukan auto-incrementing
    protected $keyType = 'string'; // Memberi tahu Eloquent bahwa tipe key adalah string (UUID)

    // Metode boot() untuk menghasilkan UUID secara otomatis saat membuat model baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
