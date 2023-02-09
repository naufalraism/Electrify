<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(18);

        return view('home', compact('products'));
    }

    public function viewDetail($id)
    {
        $products = Product::find($id);
        return view('product.show', ['product' => $products]);
    }

    public function search(Request $request)
    {
        $searchedProduct = $request->search_input;
        $products = Product::where('name', 'like', '%' . $request->search_input . '%')->paginate(6)->withQueryString();
        $allProducts = Product::all();

        return view('product.index', compact('products', 'allProducts', 'searchedProduct'));
    }

    public function searchByCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)
            ->paginate(16);

        return view('product.index', compact('products', 'category'));
    }
}