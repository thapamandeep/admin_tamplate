<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    public function cart(Product $product){

    $categories = Category::all();

    return view('Site.pages.cart', compact('categories','product'));
    }


   public function add(Product $product, Request $request){
    $data = $request->validate([
        'quantity'=>'required|integer|min:1',
       
    ]);

    if($data['quantity'] > $product->quantity){

    return redirect()->back()->with('error','you can not add to cart because stock is not avilable in your quantity');
    }

    $cart = new Cart();
    $cart->user_id = Auth::user()->id;
    $cart->product_id = $product->id;
    $cart->quantity = $data['quantity'];
    
  
    $cart->save();

    return redirect()->back()->with('success','your orders product are add in cart successfully');

   }

   public function cartShow(){
    $carts = Cart::with('product')->where('user_id', auth()->id())->get();
    // dd($carts);
    $categories = Category::all();
    return view('Site.pages.cart-collection', compact('carts','categories'));
   }

   public function deleteCart(Cart $cart){

   $cart->delete();

   return redirect()->back()->with('success','your  cart product has been remove from the add cart');
   }

   public function purchaseCart(Cart $cart, Request $request){

   $carts = Cart::where('user_id',Auth::user()->id)->get();

   foreach($carts as $cart){

   $orders = new Order();
   $orders->user_id = $cart->user_id;
   $orders->product_id = $cart->product_id;
   $orders->quantity = $cart->quantity;

   $orders->save();
   
   $cart->delete();

   }
       return redirect()->back()->with('success','Order placed successfully');
   }

//    public function  showOrder(){

//    $orders = 
//    }
}
