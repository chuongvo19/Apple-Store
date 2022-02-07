<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee',
        'city_id',
    ];
    protected $table = 'feeship';
}
