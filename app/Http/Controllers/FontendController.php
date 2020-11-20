<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FontendController extends Controller
{
    public function index(){
      $products=product::where('product_status',1)->latest()->get();
      $lmt_p=product::where('product_status',1)->latest()->limit(3)->get();
      $categories=Category::where('category_status',1)->latest()->get();
      return view('pages.index',compact('products','categories','lmt_p'));
    }

    // ==========Product Details==========
    public function productDetails($product_id){
      $product=Product::findOrfail($product_id);
      $category_id=$product->category_id;
      $related_p=Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();
      return view('pages.product-details',compact('product','related_p'));
    }
}
