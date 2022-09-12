<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'description',
        'cat_id',
        'brand_id',
        'images',
        'quantity',
        'sold',
        'status',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

}
