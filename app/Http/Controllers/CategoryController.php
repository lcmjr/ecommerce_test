<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Category $atualCategory)
    {
        $categories = Category::all();
        $products = $atualCategory->products()->orderBy('product_id', 'asc')->get();
        return view('category', array('products'   => $products, 'atualCategory' => $atualCategory,
                                      'categories' => $categories
        ));
    }
}
