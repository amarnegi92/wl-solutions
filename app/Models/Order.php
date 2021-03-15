<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'id',
        'order_number',
        'order_slug',
        'conf_date',
        'description',
        'user_id',
        'status'
    ];
    
}
