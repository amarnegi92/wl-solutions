<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrived extends Model
{

    protected $table="arrived";

    protected $fillable = [
        'order_number',
        'sanitized_order_number',
        'conf_date',
        'customer_code',
        'status',
        'description'
    ];
}
