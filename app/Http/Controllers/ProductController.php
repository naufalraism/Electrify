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
}
