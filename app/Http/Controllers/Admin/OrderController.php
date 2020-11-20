<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public  function index(){
        $orders=Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }

//    ==========View Order==============
    public function viewOrder($order_id){
         $order=Order::findOrFail($order_id);
         $orderItems=OrderItem::where('order_id',$order_id)->get();
         $shipping=Shipping::where('order_id',$order_id)->first();
         return view('admin.order.view',compact('order','orderItems','shipping'));
     }
}
