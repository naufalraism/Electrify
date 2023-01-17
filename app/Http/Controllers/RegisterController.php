<?php

namespace App\Http\Controllers;

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

   public function store(Request $request)
   {
      $validated = $request->validate([
         'name' => 'required|string',
         'gender' => 'required|in:F,M',
         'email' => 'required|string|email|max:255',
         'password' => 'required|string|max:255|min:8',
         'address' => 'required|string'
      ]);

      DB::beginTransaction();
      try {
         User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'address' => $validated['address'],
            'gender' => $validated['gender']
         ]);
      } catch (\Exception $e) {
         DB::rollBack();
         abort(500);
      }

      DB::commit();

      $request->session()->flash('success', 'Registration successfull! Please login!');
      return redirect()->route('login.index');
   }
}