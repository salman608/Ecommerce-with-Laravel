<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Session;
class CartController extends Controller
{
    public function addToCart(Request $request,$product_id){
      $check=Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
      if($check){
        Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
          return redirect()->back()->with('cart','Add to cart Successfully');
      }else{
        Cart::insert([
          'product_id'=>$product_id,
          'qty'=>1,
          'price'=>$request->product_price,
          'user_ip'=>request()->ip(),

        ]);
          return redirect()->back()->with('cart','Add to cart Successfully');
      }

    }
// ==============Cart Page==========
    public function cartPage(){
      $carts=Cart::where('user_ip',request()->ip())->latest()->get();
      $total=Cart::all()->where('user_ip',request()->ip())->sum
      (function($t){
        return $t->price*$t->qty;
      });
      return view('pages.cart',compact('carts','total'));
    }

    // ==============Cart Remove=========

    public function cartRemove($cart_id){
      Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();
        return redirect()->back()->with('cart_remove','Remove cart Successfully');
    }

    // ========Cart Update==============

    public function cartUpdate(Request $request,$cart_id){
      Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
        'qty'=>$request->qty,
      ]);
        return redirect()->back()->with('cart_update','Remove Update Successfully');
    }

    // ============Coupon Apply=============
    public function couponApply(Request $request){
      $check=Coupon::where('coupon_name',$request->coupon_name)->first();
      if($check){
          $total=Cart::all()->where('user_ip',request()->ip())->sum
          (function($t){
              return $t->price*$t->qty;
          });
         Session::put('coupon',[
           'coupon_name'=>$check->coupon_name,
           'coupon_discount'=>$check->coupon_discount,
           'discount_amount'=>$total * ($check->coupon_discount/100),
         ]);
         return redirect()->back()->with('cart_update',' Coupon Applied Successfully');
      }else{
        return redirect()->back()->with('cart_update','Invalid Coupon');
      }
    }
// =============Coupon Remove form cart=========
    public function couponDestroy(){
      if(Session::has('coupon')){
        session()->forget('coupon');
      }
      return redirect()->back()->with('cart_update',' Coupon Remove Successfully');
    }

}
