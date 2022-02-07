<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $products = Product::limit(16)->get();
        $sort = 0;
        return view('frontend.index', compact('categories', 'products','sort'));
    }
    public function sortIndexAsc(Request $request)
    {
        $sort = $request->input('sort');
        $categories = Category::all();
        if($sort == 2)
        {
            // asc
            $products = Product::orderBy('price', 'asc')->limit(16)->get();
        }
        if($sort ==1)
        {
            // desc
            $products = Product::orderBy('price', 'desc')->limit(16)->get();
        }
        if( $sort == 0)
        {
            $products = Product::limit(16)->get();
        }
        return view('frontend.index', compact('categories', 'products','sort'));
    }

    public function indexSearch(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->get();
        $sort = 0;
        return view('frontend.index', compact('categories', 'products','sort'));
    }
}
