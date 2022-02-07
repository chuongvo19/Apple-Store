<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\FeeShip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $sessionId = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart == true)
        {
            $is_avaiable = false;
            foreach(session('cart') as $key => $value)
            {
                if($value['product_id'] == $data['cart_product_id'])
                {
                    $is_avaiable = true;
                    $cart[$key]['product_quantity']++;
                }
            }
            Session::put('cart', $cart);
            if($is_avaiable == false)
            {
                $cart[] = array(
                    'session_id' => $sessionId,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        }else
            {
                $cart[] = array(
                    'session_id' => $sessionId,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        $subTotal = 0;
        foreach($cart as $key => $value)
        {
            $subTotal = $subTotal + ($value['product_price']*$value['product_quantity']);
        }
        // print_r(session('cart'));
        return view('frontend.shoppingCart._cart-sidebar', compact('subTotal'));
    }
    public function deleteListCart($sessionId)
    {
        $cart = Session::get('cart');
        if($cart == true)
        {
            foreach($cart as $key => $value)
            {
                if($value['session_id'] == $sessionId)
                {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            $subTotal = $this->subTotal(session('cart'));
            $countsibar = count($cart);
            $response = array(
                'sub-total' => number_format($subTotal),
                'count-sibar' => $countsibar,
            );
            return $response;
        }
    }
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
    public function showListCart()
    {
        $categories = Category::all();
        return view("frontend.shoppingCart.cart-page", compact('categories'));
    }

    public function updateCartQuantity(Request $request)
    {
        $product = $request->input();
        $cart = Session::get('cart');
        if($cart)
        {
            foreach($cart as $key => $value)
            {
                if($value['session_id'] == $product['session_id'])
                {
                    $cart[$key]['product_quantity'] = $product['product_quantity'];
                    $totalProduct = $value['product_price']*$product['product_quantity'];
                    // session(['total-product' => );
                }
            }
            Session::put('cart', $cart);
            $subTotal = $this->subTotal(session('cart'));
            $resultUpdate = array(
                'total-product' => number_format($totalProduct),
                'sub-total'     => number_format($subTotal),
                'session_id'    => $request->input('session_id'),
                'product-quantity' => $request->input('product_quantity'),
            );
            return $resultUpdate;
        }
        return ;
    }

    public function showCheckOut()
    {
        $categories = Category::all();
        $id = Auth::user()->id;
        $user = User::join('user_address',  'users.id', '=', 'user_address.user_id')
                    ->where('users.id', $id)
                    ->first();
        $citys = City::all();
        $feeShip = FeeShip::where('city_id', $user->city_id)->first();
        $district = District::where('id', $user->district_id)->first();
        return view('frontend.shoppingCart.check_Out', compact('categories', 'user', 'citys', 'district', 'feeShip'));
    }

    public function feeShipUpdate($id)
    {
        $cityId = $id;
        $feeShip = FeeShip::where('city_id', $cityId)->first();
        $subTotal = $this->subTotal(session('cart'));
        $resultSubTotal = $subTotal - $feeShip->fee;
        $result = array(
            'fee' => number_format($feeShip->fee),
            'subTotal' => number_format($resultSubTotal),
        );
        return $result;
    }
}
