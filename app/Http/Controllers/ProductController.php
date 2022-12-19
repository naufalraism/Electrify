<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
   public function home()
   {
      $products = Product::all()->paginate(4);

      return view('electrify-customer.home', compact('products'));
   }
}