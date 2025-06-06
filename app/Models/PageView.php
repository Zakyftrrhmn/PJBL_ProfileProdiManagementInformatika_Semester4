<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public $timestamps = false; // karena kamu tidak pakai created_at & updated_at

    protected $fillable = [
        'page_slug',
        'ip_address',
        'viewed_at',
    ];
}
