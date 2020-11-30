<?php

namespace App\Http\Controllers;

use App\cart;
use App\OrderItem;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class UserController extends Controller
{

        public function order(){
            $orders=Order::where('user_id',Auth::id())->latest()->get();
            return view('pages.profile.order',compact('orders'));
        }

        public function orderView($order_id){
            $total=Cart::all()->where('user_ip',request()->ip())->sum
            (function($t){
                return $t->price*$t->qty;
            });
            $order=Order::findOrFail($order_id);
            $orderItems=OrderItem::with('product')->where('order_id',$order_id)->get();
            $shipping=Shipping::where('order_id',$order_id)->first();
            return view('pages.profile.order_view',compact('order','orderItems','shipping','total'));
        }

}
