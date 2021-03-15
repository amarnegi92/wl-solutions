<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'ar_title',
        'ku_title',
        'content',
        'ar_content',
        'ku_content',
        'created_by',
        'lang'
    ];
}
