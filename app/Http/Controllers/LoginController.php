<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
      return view('auth.login');
   }

   public function authenticate(LoginRequest $request)
   {
      if (Auth::attempt($request)) {
         $request->session()->regenerate();
         $request->session()->put('auth');

         $request->session()->flash('success', 'Login successfull!');
         return redirect()->intended(route('home'));
      }

      return back()->with('loginError', 'Wrong Email/Password. Login Failed!');
   }

   public function logout(Request $request)
   {
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      Auth::logout();

      return redirect()->route('login');
   }
}