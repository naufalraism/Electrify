<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function cartPage()
   {
      $cart = Cart::all()->where('user_id', '==', Auth::user()->id);
      if ($cart != null) {
         $total = 0;
         foreach ($cart as $c) {
            $total += $c->product->price * $c['quantity'];
         }
      } else {
         $total = 0;
      }
      return view('product.cart', compact('cart', 'total'));
   }

   public function addToCart(Request $request, Product $product)
   {
      $request->validate([
         'quantity' => 'required | min :1|max:' . $product->stock
      ]);

      $carts = Cart::all()->where('user_id', Auth::id());
      $count = 0;

      foreach ($carts as $cart) {
         if ($cart->product_id == $product->id) {
            $newCart = Cart::find($cart->id);
            $newCart->quantity = $cart->quantity + $request->input('quantity');
            $newCart->save();
            return redirect()->route('cartPage')->with('success-swal', 'Product has been added to cart!');
         }
      }
      if ($count == 0) {
         $newCart = new Cart();
         $newCart->user_id = Auth::id();
         $newCart->product_id = $product->id;
         $newCart->quantity = $request->input('quantity');
         $newCart->save();
         return redirect()->route('cartPage')->with('success-swal', 'Product has been added to cart!');
      }
   }

   public function checkout()
   {
      $carts = Cart::all()->where('user_id', '==', Auth::user()->id);
      foreach ($carts as $cart) {
         $tempProduct = Product::find($cart->product_id);
         $tempProduct->stock = $tempProduct->stock - $cart->quantity;
         if ($tempProduct->stock > 0) {
            $tempProduct->sold = $tempProduct->sold + $cart->quantity;
            $tempProduct->save();
         } elseif ($tempProduct->stock == 0) {
            $tempProduct->delete();
         }
         Cart::find($cart->id)->delete();
      }
      return view('product.checkout');
   }

   public function deleteCart(Cart $cart)
   {
      $cart->delete();
      return redirect()->route('cartPage')->with('success-swal', 'Product has been deleted from cart!');
   }
}
