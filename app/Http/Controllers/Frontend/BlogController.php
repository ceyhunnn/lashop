<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogs;

class BlogController extends Controller
{
    public function index() {
      $bloglist=Blogs::orderBy('id','desc')->take(3)->get();
      $data['blog']=Blogs::all()->sortBy('id');
      return view('frontend.blogs.index',compact('data','bloglist'));
    }

    public function detail($id) {
      $bloglist=Blogs::orderBy('id','desc')->take(3)->get();
      $blog=Blogs::where('id',$id)->first();
      return view('frontend.blogs.detail',compact('blog','bloglist'));
    }





}
