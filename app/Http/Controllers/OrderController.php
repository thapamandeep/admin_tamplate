<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\OrderStatusUpdated;


class OrderController extends Controller
{
    public function updateOrderStatus(Order $order){

    $order->status = 'shipping';

    $order->save();

    $data = [
        'name'=> $order->user->name,
        'product'=> $order->product->title,
        'status'=> $order->status,
    ];
    Mail::to($order->user->email)->send(new OrderStatusUpadte($data));

    return redirect()->back()->with('success',' order status updated ');
    }
}
