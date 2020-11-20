<?php

namespace App\Http\Controllers;
use App\cart;
use Auth;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        $total=Cart::all()->where('user_ip',request()->ip())->sum
        (function($t){
            return $t->price*$t->qty;
        });

      if(Auth::check()){
        return view('pages.checkout', compact('total'));
      }else{
        return redirect()->route('login');
      }

    }
}
