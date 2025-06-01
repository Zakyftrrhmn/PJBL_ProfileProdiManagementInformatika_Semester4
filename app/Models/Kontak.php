<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'link_fb',
        'link_twitter',
        'link_instagram',
        'link_wa',
        'link_website',
        'no_telp',
        'gmail',
        'location',
    ];
}
