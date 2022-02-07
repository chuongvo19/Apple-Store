<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\FeeShip;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceOrderController extends Controller
{
    //
    public function subTotal($cart)
    {
        $subTotal = 0;
        foreach($cart as $key => $value)
        {
            $price = $value['product_price'] * $value['product_quantity'];
            $subTotal += $price;
        }
        return $subTotal;
    }

    public function placeOrder(Request $request)
    {
        // dd($request->input());
        if(session('cart'))
        {
            $subTotal = $this->subTotal(session('cart'));
            $feeShip = FeeShip::where('city_id', $request->input('city'))->first()->fee;
            $resultSubTotal = $subTotal - $feeShip;
            $order = Order::create([
                'total_price' => $resultSubTotal,
                'email' => $request->input('email'),
                'user_id' => Auth::user()->id,
                'status' => 0,
            ]);

            if($order)
            {
                foreach(session('cart') as $key => $value)
                {
                    $orderItem = OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $value['product_name'],
                        'product_price' => $value['product_price'],
                        'product_quantity' => $value['product_quantity'],
                    ]);

                    if($orderItem)
                    {
                        $inventoryId = Product::where('id', $value['product_id'])->first()->inventory_id;
                        $inventory = Inventory::where('id', $inventoryId);
                        $quantityOld = $inventory->first()->quantity;
                        $quantityNew = $quantityOld - $value['product_quantity'];
                        $updateQuantity = $inventory->update([
                            'quantity' => $quantityNew,
                        ]);
                    }
                }

                $shipping = Shipping::create([
                    'order_id' => $order->id,
                    'customer_name' => $request->input('name'),
                    'telephone' => $request->input('telephone'),
                    'address' => $request->input('address'),
                    'district_id' => $request->input('district'),
                    'city_id' => $request->input('city'),
                ]);

                session()->forget('cart');
                $categories = Category::all();
                return view('frontend.shoppingCart.notification-place-order');
            }
        }
    }

    public function showOrder()
    {
        $id = Auth::user()->id;
        $categories = Category::all();
        $order = Order::where('user_id', $id )->get();
        return view('frontend.shoppingCart.show-order', compact('categories', 'order'));
    }

    public function showOrderItem($id)
    {
        $orderItem = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        $city = City::where('id', $shipping->city_id)->first()->name;
        $district = District::where('id', $shipping->district_id)->first()->name;
        return view('frontend.shoppingCart.show-order-item', compact('orderItem', 'shipping','city', 'district'));
    }
}
