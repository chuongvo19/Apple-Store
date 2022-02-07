<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->join('inventories', 'products.inventory_id', '=', 'inventories.id')
                            ->select('products.*', 'categories.name_category', 'inventories.quantity')
                            ->paginate(10);
        return view('backend.products.list', compact('products'));
    }
    public function create()
    {   
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png,bmp',
        // ]);
        $myTime = Carbon::now()->format('YmdHis');
        $images = $request->file('image');
        if(count($images) > 4)
        {
            return redirect()->back()->with('error', 'Bạn chỉ được upload tối đa 4 file');
        }
        $imageNames = [];
        foreach ($images as $key => $image)
        {
            $imageNames[] = $myTime.'-'.$key.'-'.$image->getClientOriginalName();
        }
        $inventory = Inventory::create(['quantity' => $request->input('quantity')]);
        // $product = Product::create(array_merge($request->except('quantity'), ['image' => $imageNames, 'inventory_id' => $inventory->id]));
        $product = Product::create([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'image' => implode("|", $imageNames),
            'price' => $request->input('price'),
            'color' => $request->input('color'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'inventory_id' => $inventory->id,
        ]);
        $digital = Specification::create([
            'product_id' => $product->id,
            'waterproof' => 0,
        ]);
        if($inventory && $product && $digital)
        {
            foreach($images as $key => $image)
            {
                $image->storeAs('',$imageNames[$key],'products');
            }
        }
        return redirect()->back()->with('notification', 'Create Success');
    }

    public function searchProduct(Request $request)
    {
        $sort = $request->input('sort');
        $searchText = $request->input('search');
        if($sort == 1)
        {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('inventories', 'products.inventory_id', '=', 'inventories.id')
                                ->select('products.*', 'categories.name_category', 'inventories.quantity')
                                ->where(function($query) use($searchText) {
                                    $query->where('products.name', 'LIKE', '%'.$searchText.'%');
                                    $query->orWhere('categories.name_category', 'LIKE', '%'.$searchText.'%');
                                })
                                ->orderBy('products.price', 'desc')
                                ->paginate(10);
        }
        if($sort == 2)
        {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('inventories', 'products.inventory_id', '=', 'inventories.id')
                                ->select('products.*', 'categories.name_category', 'inventories.quantity')
                                ->where(function($query) use($searchText) {
                                    $query->where('products.name', 'LIKE', '%'.$searchText.'%');
                                    $query->orWhere('categories.name_category', 'LIKE', '%'.$searchText.'%');
                                })
                                ->orderBy('products.price', 'asc')
                                ->paginate(10);
        }
        if($sort == 0)
        {
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('inventories', 'products.inventory_id', '=', 'inventories.id')
                                ->select('products.*', 'categories.name_category', 'inventories.quantity')
                                ->where(function($query) use($searchText) {
                                    $query->where('products.name', 'LIKE', '%'.$searchText.'%');
                                    $query->orWhere('categories.name_category', 'LIKE', '%'.$searchText.'%');
                                })
                                ->paginate(10);
        }
        $products->appends(['search' => $searchText]);
        return view('backend.products.list', compact('products'));
    }
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::where('products.id', $id)
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('inventories', 'products.inventory_id', '=', 'inventories.id')
                        ->select('products.*', 'categories.name_category', 'inventories.quantity')
                        ->first();
        $digital = Specification::where('product_id', $id)
                                ->first();
        return view('backend.products.edit', compact('product', 'digital', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $imageNames=[];
        if($request->hasFile('image'))
        {
            $myTime = Carbon::now()->format('YmdHis');
            $images = $request->file('image');
            foreach ($images as $key => $image)
            {
                $imageNames[] = $myTime.'-'.$key.'-'.$image->getClientOriginalName();
            }
        }else
            {
                $imageNames = $request->input('image');
            }
        $product = Product::where('id', $id)
                        ->update([
                            'name' => $request->input('name'),
                            'desc' => $request->input('desc'),
                            'image' => implode("|", $imageNames),
                            'price' => $request->input('price'),
                            'color' => $request->input('color'),
                            'status' => $request->input('status'),
                            'category_id' => $request->input('category_id'),
                        ]);
        $inventory = Inventory::where('id', $request->input('inventory_id'))
                            ->update([
                                'quantity' => $request->input('quantity'),
                            ]);
        $digital = Specification::where('product_id', $id)
                            ->update([
                                'screen_size' => $request->input('screen_size'),
                                'rear_camera' => $request->input('rear_camera'),
                                'front_camera' => $request->input('front_camera'),
                                'chipset' => $request->input('chipset'),
                                'ram' => $request->input('ram'),
                                'rom' => $request->input('rom'),
                                'battery' => $request->input('battery'),
                                'screen_resolution' => $request->input('screen_resolution'),
                                'size' => $request->input('size'),
                                'waterproof' => $request->input('waterproof'),
                                'infomation' => $request->input('infomation'),
                            ]);
        if($product && $inventory && $digital)
        {
            if($request->hasFile('image'))
            {
                foreach($images as $image)
                {
                    $image->storeAs('',$imageNames[$key],'products');
                }
                foreach($request->input('image') as $value)
                {
                    Storage::disk('products')->delete($value);
                }
            }
        }
        return redirect()->back()->with('notification', 'Update Success');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('notification', 'Delete Success');
    }
}
