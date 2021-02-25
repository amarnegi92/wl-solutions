<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
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