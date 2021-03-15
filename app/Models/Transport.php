<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    
    protected $fillable = [
        'user_id',
        'ship_type',
        'ctn_qty',
        'received_date',
        'description',
        'batch_number',
        'volume',
        'weight',
        'eta',
        'container_number',
        'ship_status'
    ];
}
