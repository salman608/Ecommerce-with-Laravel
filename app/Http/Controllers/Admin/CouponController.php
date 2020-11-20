<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function index(){
  $coupons=Coupon::latest()->get();
    return view('admin.coupon.index',compact('coupons'));
  }

  // ======store Coupon====
      public function couponStore(Request $request){
        $request->validate([
          'coupon_name'=>'required|unique:coupons,coupon_name',
          'coupon_discount'=>'required|unique:coupons,coupon_discount',
        ]);

        Coupon::insert([
          'coupon_name'=> $request->coupon_name,
          'coupon_discount'=> $request->coupon_discount,
          'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success','Coupon Upload');
      }
      // ===========Admin Coupon Edit==========

      public function couponEdit($coupon_id){
        $coupon=Coupon::find($coupon_id);
        return view('admin.coupon.edit',compact('coupon'));
      }
  // ===========Admin Coupon Update==========
      public function couponUpdate(Request $request){
        $coupon_id=$request->id;
        Coupon::find($coupon_id)->update([
          'coupon_name'=> $request->coupon_name,
          'coupon_discount'=> $request->coupon_discount,
          'updated_at'=>Carbon::now()
        ]);
        return redirect()->route('admin.coupon')->with('success','Coupon Update Successfully');
      }

      // ===========Admin Coupon Active==========
      public function couponInactive($coupon_id){
        $coupon=Coupon::find($coupon_id)->update(['coupon_status'=>0]);
        return redirect()->back()->with('success','Coupon Inactive successfully');
      }

      // ===========Admin Coupon InActive==========
      public function couponActive($coupon_id){
        $coupon=Coupon::find($coupon_id)->update(['coupon_status'=>1]);
        return redirect()->back()->with('success','Coupon Active successfully');
      }
}
