<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $brands=Brand::latest()->get();
    return view('admin.brand.index',compact('brands'));
  }

  // ======store Brand====
      public function storeBrand(Request $request){
        $request->validate([
          'brand_name'=>'required|unique:brands,brand_name'
        ]);

        Brand::insert([
          'brand_name'=> $request->brand_name,
          'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success','brand Upload');
      }

      // =============edit Brand===========

      public function editBrand($brand_id){
        $brand=Brand::find($brand_id);
        return view('admin.brand.edit',compact('brand'));

      }

      // ======Update Brand====
          public function updateBrand(Request $request){
            $brand_id=$request->id;

            Brand::find($brand_id)->update([
              'brand_name'=> $request->brand_name,
              'created_at'=>Carbon::now()
            ]);
            return redirect()->route('admin.brand')->with('success','Brand Update Successfully');
          }

          // =============Delete Brand===========
              public function deleteBrand($brand_id){
                $brand=Brand::find($brand_id)->delete();
                return redirect()->back()->with('success','Brand Delete successfully');
              }

          // =======Status inactive========
              public function inactiveBrand($brand_id){
                $brand=Brand::find($brand_id)->update(['brand_status'=>0]);
                return redirect()->back()->with('success','brand Active successfully');
              }

              // =======Status inactive========
              public function activeBrand($brand_id){
                $brand=Brand::find($brand_id)->update(['brand_status'=>1]);
                return redirect()->back()->with('success','brand InActive successfully');

              }
}
