<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function create(Request $request)
  {

      $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|Min:6'
      ]);

      $user = User::insert(
          [
              "name" => $request->name,
              "email" => $request->email,
              "user_file" => null,//İşlem
              "password" => Hash::make($request->password),
              "user_status" => 1,
              "role" => 'user',

          ]
      );

      if ($user) {
          return redirect(route('home.Index'))->with('success', 'İşlem Başarılı');
      }
      return back()->with('error', 'İşlem Başarısız');
  }

  public function authenticate(Request $request) {
    $request->flash();

    $credentials=$request->only('email', 'password');
    $remember_me=$request->has('remember_me') ? true : false;

    if (Auth::attempt($credentials, $remember_me)) {
      return redirect()->intended(route('home.Index'));
    }
    else {
      $user=0;
      return back()->with('error','Email or Password is False');
    }

  }

  public function logout(){
    Auth::logout();
    return redirect(route('home.Index'));
  }









}
