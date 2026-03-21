<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderStatusUpdated;


class OrderController extends Controller
{
public function markUserShipping($orderId) {
  
   
        $order = Order::with('user','product')->findOrFail($orderId);


 
        $order->status = 'shipping';
        $order->save();
    


    $user = $order->user ?? Auth::user();

    Mail::to($order->user->email)->send(new OrderStatusUpdated($order));

    return redirect()->back()->with('success','All orders for this user marked as Shipping');
}
public function markUserDelivered($orderId) {


        $order = Order::with('user','product')->findOrFail($orderId);
    
        $order->status = 'delivered';
        $order->save();
    


    Mail::to($order->user->email)->send(new OrderStatusUpdated($order));

    return redirect()->back()->with('success','All orders for this user marked as Delivered');
}

public function myOrder(){

$orders = Order::where('user_id',Auth::user()->id)->get();
$categories = Category::all();
return view('Site.pages.my-orders',compact('orders','categories'));
}

public function myOrderDelete(Order $order){

$order->delete();

return redirect()->back()->with('success','your order has been remove');
}

// ------------------for product review-------------------------//

public function review($product_id){

// dd($product_id);

    $product = Product::findOrFail($product_id);
    $categories = Category::all();

return view('site.review.product-review', compact('product','categories'));
}

public function sendReview(Request $request,$product_id){

// dd($product_id);

$request->validate([
    'rate'=>'required',
    'message'=>'required',
]);

$product = Product::findOrFail($product_id);

$review = new Review();
$review->user_id = Auth::user()->id;
$review->product_id = $product->id;
$review->rate = $request['rate'];
$review->message = $request['message'];

$review->save();


return redirect()->back()->with('success','your review has submitted');
}

public function allReview(){

$reviews = Review::all();
$categories = Category::all();

return view('review.index', compact('reviews','categories'));
}
}
