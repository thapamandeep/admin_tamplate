<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class Category extends Model
{
  protected $fillable =[
    'name',
    'image'
  ];

  public function product(){

  return $this->hashMany(Product::class,'category_id');
  }
}
