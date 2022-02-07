<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showOrder()
    {
        $orders = Order::join('users', 'order.user_id', '=', 'users.id')
                        ->select('order.*', 'users.last_name', 'users.first_name')
                        ->get();
        return view('backend.order.all-order', compact('orders'));
    }

    public function changeStatusOrder(Request $request)
    {
        $order = Order::where('id', $request->input('orderId'))
                    ->update([
                        'status' => $request->input('status'),
                    ]);
    }

    public function deleteOrder($id)
    {
        $order = Order::where('id', $id)->delete();
        if($order)
        {
            Shipping::where('order_id', $id)->delete();
            OrderItem::where('order_id', $id)->delete();
        }
    }

    public function showOrderItem($id)
    {
        $orderItem = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        $city = City::where('id', $shipping->city_id)->first()->name;
        $district = District::where('id', $shipping->district_id)->first()->name;
        return view('backend.order.all-order-item', compact('orderItem', 'shipping', 'city', 'district'));
    }
}
