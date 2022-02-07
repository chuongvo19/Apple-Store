<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::join('specifications',  'products.id', '=', 'specifications.product_id')
                        ->where('products.id', $id)
                        ->first();
        $products = Product::where('category_id', $product->category_id)
                        ->whereNotIn('id', [$id])
                        ->get();
        return view('frontend.product.show', compact('product','products', 'categories'));
    }
}
