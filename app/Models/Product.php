<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Review;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'quantity',
        'cost',
    ];

    // Product belongs to a category
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    // Product can be in many cart items
    public function carts(){
        return $this->hasMany(Cart::class,'product_id');
    }

    public function reviews()
{
    return $this->hasMany(Review::class);
}
}