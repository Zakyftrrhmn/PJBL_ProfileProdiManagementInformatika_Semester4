<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';

    protected $fillable = ['tahun_kurikulum', 'nama_kurikulum', 'file_kurikulum'];
}
