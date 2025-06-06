<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    protected $table = 'hubungi_kami';

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
