<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class UserController extends Controller
{

        public function order(){
            $orders=Order::where('user_id',Auth::id())->latest()->get();
            return view('pages.profile.order',compact('orders'));
        }

}
