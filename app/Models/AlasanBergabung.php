<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Tambahkan ini

class AlasanBergabung extends Model
{
    protected $table = 'alasan_bergabung';

    protected $fillable = ['alasan'];

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
