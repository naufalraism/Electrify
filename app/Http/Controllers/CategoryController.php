<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory(Category $category){
        $productCategory = Product::where('category_id', $category->id)
                                    ->paginate(16);

        return view('category.categories',
            compact('productCategory', 'category'));
    }
}