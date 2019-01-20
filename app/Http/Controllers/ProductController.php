<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', array('products' => $products, 'categories' => $categories));
    }

    public function __invoke(Product $product)
    {
        $categories = Category::all();
        return view('product', array('product' => $product, 'categories' => $categories));
    }

    public function search(Request $request)
    {
        $searchField = mb_convert_case($request->search, MB_CASE_LOWER);
        $products = Product::where(DB::raw('lower(name)'), 'like', '%' . $searchField . '%')
            ->orWhere(DB::raw('lower(description)'), 'like', '%' . $searchField . '%')
            ->orWhereHas('features', function ($query) use ($searchField) {
                $query->where(DB::raw('lower(name)'), 'like', '%' . $searchField . '%');
                $query->orWhere(DB::raw('lower(value)'), 'like', '%' . $searchField . '%');
            })->orWhereHas('categories', function ($query) use ($searchField) {
                $query->where(DB::raw('lower(name)'), 'like', '%' . $searchField . '%');
            });
        if (is_numeric($request->search)) {
            $products = $products->orWhere(DB::raw('price'), '=', $searchField);
        }
        return view('search', array(
            'products'   => $products->get(),
            'search'     => $request->search,
            'categories' => Category::all()
        ));
    }
}
