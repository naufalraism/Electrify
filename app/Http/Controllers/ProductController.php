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

        return view('all-product.index', compact('products', 'categories'));
    }

    public function viewDetail($id) {
        $products = Product::find($id);
        return view('all-product.product-details', ['product'=> $products]);
    }

    public function search(Request $request){

        $foundProduct = Product::where('name', 'like', '%'. $request->input('search_input') . '%')->paginate(6)->withQueryString();
        $allProducts = Product::all();

        return view('search-result', compact('foundProduct', 'allProducts'));
    }
}
