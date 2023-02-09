<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   public function index()
   {
      $products = Product::all();

      return view('admin.product.index', compact('products'));
   }

   public function destroy(Request $request)
   {
      $product_id = $request->product_id;

      Product::find($product_id)->delete();

      session()->flash('success-swal', 'Product Successfully Deleted!');
      return redirect()->route('admin.product.index');
   }

   public function create(Product $product)
   {
      $categories = Category::orderBy('name')->get();


      return view('admin.product.create', compact('product', 'categories'));
   }

   public function store(StoreProductRequest $request)
   {
      $folder = '/images/product/';
      $fileName = $request->image->getClientOriginalName();
      $ext = $request->image->getClientOriginalExtension();
      $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
      $request->image->move(public_path($folder), $fileFullName);

      Product::create([
         'name' => $request->name,
         'category_id' => $request->category_id,
         'price' => $request->price,
         'stock' => $request->stock,
         'description' => $request->description,
         'image' => $folder . $fileFullName,
         'sold' => 0,
      ]);

      session()->flash('success-swal', 'Product successfully created!');
      return redirect()->route('admin.product.index');
   }

   public function edit(Product $product)
   {
      $categories = Category::orderBy('name')->get();


      return view('admin.product.edit', compact('product', 'categories'));
   }

   public function update(UpdateProductRequest $request, Product $product)
   {
      $fileName = null;
      $fileFullName = null;

      $payloadToUpdate = [
         'name' => $request->name,
         'category_id' => $request->category_id,
         'price' => $request->price,
         'stock' => $request->stock,
         'description' => $request->description
      ];

      if ($request->image) {
         $folder = '/images/product/';
         $fileName = $request->image->getClientOriginalName();
         $ext = $request->image->getClientOriginalExtension();
         $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
         $request->image->move(public_path($folder), $fileFullName);
         $payloadToUpdate['image'] =  $folder . $fileFullName;
      }

      $product->update($payloadToUpdate);

      session()->flash('success-swal', 'Product successfully updated!');
      return redirect()->route('admin.product.index');
   }
}
