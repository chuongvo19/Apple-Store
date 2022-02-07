<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    //
    public function showStatistical()
    {
        $countOrder = Order::count();
        $totalPrice = Order::sum('total_price');
        return view('backend.statistical.statistical', compact('countOrder', 'totalPrice'));
    }

    public function showStatisticalFillter(Request $request)
    {
        // print_r($request->input());
        $order = Order::whereBetween('created_at', [$request->input('startDay'), $request->input('endDay')]);
        $countOrder = $order->count();
        $totalPrice = $order->avg('total_price');
        $result = array(
            'count-order' => $countOrder,
            'total' => number_format($totalPrice),
        );
        // print_r($result);
        // return view('backend.statistical.statistical-table', compact('result'));
    }
}
