<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index()
   {
      return view('auth.register');
   }

   public function store(RegisterRequest $request)
   {
      DB::beginTransaction();
      try {
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'gender' => $request->gender
         ]);
      } catch (\Exception $e) {
         DB::rollBack();
         abort(500);
      }

      DB::commit();

      $request->session()->flash('success', 'Registration successfull! Please login!');
      return redirect()->route('login');
   }
}