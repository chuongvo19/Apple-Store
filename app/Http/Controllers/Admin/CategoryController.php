<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
        return view('backend.category.create-categories');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $nameCategory = ucwords($request->input('name'));
        if(Category::where('name_category', $nameCategory)->exists())
        {
            return redirect()->back()->with('error', 'Danh Mục Đã Tồn Tại');
        }
        $category = new Category;
        $category->name_category = $nameCategory;
        $category->desc = $request->input('desc');
        $category->save();
        return redirect()->back()->with('notification', 'Create Success');
    }
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.category.list-categories', compact('categories'));
    }
    public function searchCategory(Request $request)
    {
        $searchText = $request->input('search');
        $categories = Category::where('name_category', 'LIKE', '%'.$searchText.'%')
                        ->paginate(10);
        $categories->appends(['search' => $searchText]);
        return view('backend.category.list-categories', compact('categories'));
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('notification', 'Delete Success');
    }
}
