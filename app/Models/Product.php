<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'image',
        'price',
        'color',
        'status',
        'category_id',
        'inventory_id',
    ];
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
