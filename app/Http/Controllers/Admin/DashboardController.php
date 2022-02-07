<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $countUser = User::where('role', 3)->count();
        $countProduct = Product::count();
        $countOrder = Order::count();
        return view('backend.dashboard', compact('countUser', 'countProduct', 'countOrder'));
    }
}
