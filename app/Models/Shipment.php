<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = 'shipments';
    protected $fillable = [
        'batch_number',
        'order_number',
        'arrived_id',
        'date',
        'ship_type',
        'status',
        'description'
    ];
}