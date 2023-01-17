<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        $categories = Category::all();

        return view('electrify-customer.all-product.index', compact('products', 'categories'));
    }

    public function viewDetail($id) {
        $product = Product::find($id);
        return view('electrify-customer.all-product.product-details', ['product'=> $product]);
    }

    public function search(Request $request){
        dd('here');
        $foundProduct = Product::where('name', 'like', '%'. $request->search_input . '%')->paginate(6)->withQueryString();
        $allProducts = Product::all();

        return view('search-result', compact('productResults', 'products'));
    }
}
