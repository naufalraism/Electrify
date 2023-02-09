<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
         $folder = '/images/user/';
         $fileName = $request->profile_picture->getClientOriginalName();
         $ext = $request->profile_picture->getClientOriginalExtension();
         $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
         $request->profile_picture->move(public_path($folder), $fileFullName);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'gender' => $request->gender,
            'profile_picture' => $folder . $fileFullName,
            'phone_number' => $request->phone_number
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
