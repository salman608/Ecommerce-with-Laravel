<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;


class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    public function index(){
      $categories=Category::latest()->get();
      return view('admin.category.index',compact('categories'));
    }
// ======store category====
    public function storeCat(Request $request){
      $request->validate([
        'category_name'=>'required|unique:categories,category_name'
      ]);

      Category::insert([
        'category_name'=> $request->category_name,
        'created_at'=>Carbon::now()
      ]);
      return redirect()->back()->with('success','Category Upload');
    }

// =============edit category===========

public function editCat($cat_id){
  $category=Category::find($cat_id);
  return view('admin.category.edit',compact('category'));

}

// ======Update category====
    public function updateCat(Request $request){

      $cat_id=$request->id;

      Category::find($cat_id)->update([
        'category_name'=> $request->category_name,
        'created_at'=>Carbon::now()
      ]);
      return redirect()->route('admin.category')->with('success','Category Update Successfully');
    }
// =============Delete category===========
    public function deleteCat($cat_id){
      $category=Category::find($cat_id)->delete();
      return redirect()->back()->with('success','Category Delete successfully');
    }

    // =======Status inactive========
    public function inactiveCat($cat_id){
      $category=Category::find($cat_id)->update(['category_status'=>0]);
      return redirect()->back()->with('success','Category Active successfully');

    }

    // =======Status inactive========
    public function activeCat($cat_id){
      $category=Category::find($cat_id)->update(['category_status'=>1]);
      return redirect()->back()->with('success','Category InActive successfully');

    }

}
