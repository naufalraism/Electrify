<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'name' => 'required|unique:products,name',
         'category_id' => 'required|exists:categories,id',
         'price' => 'required|integer',
         'stock' => 'required|integer',
         'image' => 'nullable|image',
         'description' => 'required|string'
      ];
   }
}
