<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'name' => 'required|string',
         'gender' => 'required|in:F,M',
         'email' => 'required|string|email|max:255|unique:users,email,'. Auth::id(),
         'password' => 'nullable|string|max:255|min:8',
         'address' => 'required|string',
         'phone_number' => 'required|max:12',
         'profile_picture' => 'nullable|image'
      ];
   }
}
