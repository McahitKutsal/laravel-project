<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(){
    return view('home.login');
  }
  public function loginPost(Request $request){
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->route('admin.index');
    }
    else {
      return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı!');
    }
  }
  public function logout(){
    Auth::logout();
    return redirect()->route('login');
  }
}
