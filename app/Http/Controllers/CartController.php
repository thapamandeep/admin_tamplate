<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdated;
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

      $totalCost = $product->cost * $data['quantity'];

    $cart = new Cart();
    $cart->user_id = Auth::user()->id;
    $cart->product_id = $product->id;
    $cart->quantity = $data['quantity'];
    $cart->total_cost = $totalCost;
    
  
    $cart->save();

     return redirect()->back()->with('success', 'Order placed successfully and email sent!');

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

   public function purchaseCart( Request $request){

   $carts = Cart::where('user_id',Auth::user()->id)->get();

   

   foreach($carts as $cart){

   $orders = new Order();
   $orders->user_id = $cart->user_id;
   $orders->product_id = $cart->product_id;
   $orders->quantity = $cart->quantity;
   $orders->status = 'processing';

   $orders->save();

   $product = Product::find($cart->product_id);

   if($product){

   if($product->quantity>=$cart->quantity){

   $product->quantity-= $cart->quantity;

   $product->save();

   }else{

   return redirect()->back()->with('error','stock not avilable');
   }
   }
   



   $cart->delete();
       
     Mail::to(Auth::user()->email)->send(new OrderStatusUpdated($orders));
   

   }
 

       return redirect()->back()->with('success','Order placed successfully');
   }

   

   public function  showOrder(){


  $orders = Order::with('product','user')->get();

    // Group orders by user_id
    //  $userOrder = Order::with('product', 'user')
    //     ->get()
    //     ->groupBy(fn($order) => $order->user?->id ?? 0); 

  return view('pages.order.index',compact('orders'));
   }
}
