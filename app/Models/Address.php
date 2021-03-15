<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses'; 
    protected $fillable = [
        'user_id',
        'address',
    ];
}
