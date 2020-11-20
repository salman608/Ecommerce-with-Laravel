<?php

namespace App\Http\Controllers;

use App\cart;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function storeOrder(Request $request){
       $request->validate([
           'shipping_first_name'=>'required',
           'shipping_last_name'=>'required',
           'shipping_phone'=>'required',
           'shipping_email'=>'required',
           'address'=>'required',
           'state'=>'required',
           'post_code'=>'required',
           'payment_type'=>'required',
       ]);
       $order_id=Order::insertGetId([
           'user_id'=>Auth::id(),
           'invoice_no'=>mt_rand(1000000,99999999),
           'payment_type'=>$request->payment_type,
           'total'=>$request->total,
           'subtotal'=>$request->subtotal,
           'coupon_discount'=>$request->coupon_discount,
           'created_at'=>Carbon::now(),
       ]);

        $carts=Cart::where('user_ip',request()->ip())->latest()->get();
        foreach ($carts as $cart) {
       OrderItem::insert([
          'order_id'=>$order_id,
          'product_id'=>$cart->product_id,
          'product_qty'=>$cart->qty,
           'created_at'=>Carbon::now(),
       ]);
        }
        Shipping::insert([
            'order_id'=>$order_id,
            'shipping_first_name'=>$request->shipping_first_name,
            'shipping_last_name'=>$request->shipping_last_name,
            'shipping_phone'=>$request->shipping_phone,
            'shipping_email'=>$request->shipping_email,
            'address'=>$request->address,
            'state'=>$request->state,
            'post_code'=>$request->post_code,
            'created_at'=>Carbon::now(),
        ]);

        if(Session::has('coupon')){
            session()->forget('coupon');
        }
         Cart::where('user_ip',request()->ip())->delete();
        return Redirect()->route('order-complete')->with('cart_update','Order Place  Successfully');
    }

    public function orderComplete(){
        return view('pages.order_complete');
    }
}

