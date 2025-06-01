<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKepuasan extends Model
{
    protected $table = 'laporan_kepuasan';

    protected $fillable = ['nama_laporan', 'file_laporan'];
}
