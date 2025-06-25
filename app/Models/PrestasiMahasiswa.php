<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Tambahkan ini

class PrestasiMahasiswa extends Model
{
    protected $table = 'prestasi_mahasiswas';

    // Mengganti $guarded = ['id']; dengan $fillable
    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'nama_lomba',
        'tingkat',
        'penyelenggara',
        'tanggal_lomba',
        'peringkat',
        'file_sertifikat',
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
