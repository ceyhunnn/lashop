<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sliders;
use App\Blogs;
use App\Products;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class DefaultController extends Controller
{
    public function index() {
      $data['slider'] = Sliders::all()->sortBy('slider_must');
      $data['blog'] = Blogs::orderBy('id','desc')->take(3)->get();
      $data['product'] = Products::orderBy('id','desc')->take(8)->get();

      return view('frontend.default.index',compact('data'));
    }

    public function contact() {
      return view('frontend.default.contact');
    }

    public function post_contact(Request $request){
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required',
          'message' => 'required',
        ]);

        $data=[
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'message' => $request->message,
        ];

        Mail::to('ceyhunmuradov11@gmail.com')->send(new SendMail($data));

        return back()->with('success',"Message Sent");




    }






}
