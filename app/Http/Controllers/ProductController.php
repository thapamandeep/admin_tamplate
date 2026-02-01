<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function storeProduct(Request $request){
       $data = $request->validate([
             'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'quantity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',

        ]);

        $newImage = "";
if ($request->hasFile('image')) {
    $file = $request->file('image');
    $newImage = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('gallery', $newImage, 'public');
}

$products = new Product();
$products->title = $data['title'];
$products->description = $data['description'];
$products->image = $newImage;
$products->quantity = $data['quantity'];
$products->cost = $data['cost'];

$products->save();

return redirect()->back();

    }
}
