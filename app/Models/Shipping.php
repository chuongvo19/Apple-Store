<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_name',
        'telephone',
        'address',
        'city_id',
        'district_id',
    ];
    protected $table = 'shipping';
}
