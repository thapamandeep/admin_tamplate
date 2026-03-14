<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_cost',
    ];

    // A cart item belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    // Optional: a cart item belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}