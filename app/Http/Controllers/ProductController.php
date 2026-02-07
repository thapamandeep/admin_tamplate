<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\category;

class ProductController extends Controller
{
    public function storeProduct(Request $request){
       $data = $request->validate([
             'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'quantity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'

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
$products->category_id= $data['category_id'];

$products->save();

Session::flash('success','your products added successfully ');

return redirect()->back();

    }

    public function editProduct(Product $product){

    $categories = Category::all();

   return view('pages.editProduct',compact('product','categories'));
    }

    public function updateProduct(Request $request, Product $product){

    $data = $request->validate([
    
     'image' => 'nullable|image|mimes:jpg,jpeg,png',
    'title' => 'required|string',
    'description' => 'required|string',
    'quantity' => 'required|integer|min:1',
    'cost' => 'required|numeric|min:0',
    'category_id' => 'required|exists:categories,id'
    ]);

       


       

$product->title = $data['title'];
$product->description = $data['description'];
$product->quantity = $data['quantity'];
$product->cost = $data['cost'];
$product->category_id= $data['category_id'];

 if ($request->hasFile('image')) {
     
        $oldImage = $product->image;

        $file = $request->file('image');
        $newImage = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('gallery', $newImage, 'public');
        $product->image = $newImage;

          if ($oldImage && file_exists(storage_path('app/public/gallery/'.$product->image))) {
            unlink(storage_path('app/public/gallery/'.$product->image));
        }
    }

$product->save();


Session::flash('success','your products are update successfully ');

return redirect()->back();
    }

    public function deleteProduct(Product $product){
        $product->delete();

      return redirect()->route('get.productTable')->with('success', 'Data has been deleted');
    }
}
