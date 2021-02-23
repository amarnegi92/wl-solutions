<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrived extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'conf_date',
        'customer_code',
        'status',
        'description'
    ];
}
