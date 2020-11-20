<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addWishlist($product_id){
      if(Auth::check()){
        Wishlist::insert([
          'user_id'=>Auth::id(),
          'product_id'=>$product_id,
        ]);
        return redirect()->back()->with('cart','Add to Wishlist Successfully');
      }else{
        return redirect()->route('login')->with('login','Add First login Your Account');
      }
    }
    // ==================Wish page==========

    public function wishPage(){
      $wishlists=Wishlist::where('user_id',Auth::id())->latest()->get();
      return view('pages.wishPage',compact('wishlists'));
    }

    public function wishDestroy($wishlist_id){
        Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->delete();
          return redirect()->back()->with('cart_remove','Remove Wishlist Successfully');
    }
}
