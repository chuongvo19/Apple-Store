<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(6);
        $sort = 0;
        return view('frontend.category.index', compact('categories','products', 'sort', 'id'));
    }
    // asc
    public function indexSortAsc($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)
                            ->orderBy('price', 'asc')
                            ->paginate(6);
        return view('frontend.category.index', compact('categories','products', 'id'));
    }
    // desc
    public function indexSortDesc($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)
                            ->orderBy('price', 'desc')
                            ->paginate(6);
        return view('frontend.category.index', compact('categories','products', 'id'));
    }
    // public function sortCategory($id)
    // {
    //     // $sort = $request->input('sort');
    //     // $id = $request->input('category_id');
    //     $sort = $_GET['sort'];
    //     $categories = Category::all();
    //     if($sort == 2)
    //     {
    //         // asc
    //         $products = Product::where('category_id', $id)->orderBy('price', 'asc')->paginate(2);
    //     }
    //     if($sort ==1)
    //     {
    //         // desc
    //         $products = Product::where('category_id', $id)->orderBy('price', 'desc')->paginate(2);
    //     }
    //     if( $sort == 0)
    //     {
    //         $products = Product::where('category_id', $id)->paginate(2);
    //     }
    //     return view('frontend.category.index', compact('categories', 'products','sort', 'id'));
    // }
}
