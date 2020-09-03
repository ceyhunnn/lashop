<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;

class ProductController extends Controller
{
    public function index() {
      $data['product']=Products::all()->sortBy('id');
      return view('frontend.products.index',compact('data'));
    }

    public function detail($id) {
      $product=Products::where('id',$id)->first();
      $productlist=Products::where('product_category',$product->product_category)->orderBy('id','desc')->get();

      return view('frontend.products.detail',compact('product','productlist'));
    }





}
