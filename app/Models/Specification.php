<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'screen_size',
        'rear_camera',
        'front_camera',
        'chipset',
        'ram',
        'rom',
        'battery',
        'screen_resolution',
        'size',
        'waterproof',
        'infomation',
    ];
}
