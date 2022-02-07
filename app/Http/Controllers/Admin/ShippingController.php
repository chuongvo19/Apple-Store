<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\FeeShip;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //
    public function showManagerShipping()
    {
        $datas = FeeShip::join('city', 'feeship.city_id', '=', 'city.id')
                        ->select('feeship.*', 'city.name')
                        ->orderBy('city.name', 'desc')
                        ->paginate(10);
        $citys = City::select('name','id')
                    ->orderBy('id', 'asc')
                    ->get();
        return view('backend.shipping.shipping', compact('datas', 'citys'));
    }

    public function showManagerShippingCity(Request $request)
    {
        $cityId = $request->input('city-id');
        if($cityId == 0)
        {
            $datas = FeeShip::join('city', 'feeship.city_id', '=', 'city.id')
                        ->select('feeship.*', 'city.name')
                        ->orderBy('city.name', 'desc')
                        ->limit(10)
                        ->get();
            
            return view('backend.shipping.table-shipping', compact('datas'));
        }else
            {
                if(FeeShip::where('city_id', $cityId)->exists())
                {
                    $dataCity = FeeShip::where('feeship.city_id', $cityId)
                        ->join('city', 'feeship.city_id', '=', 'city.id')
                        ->select('feeship.*', 'city.name')
                        ->first();
                }else
                    {
                        $city = FeeShip::create([
                            'city_id' => $cityId,
                            'fee' => 0,
                        ]);
                        if($city)
                        {   
                            $dataCity = FeeShip::where('feeship.city_id', $cityId)
                            ->join('city', 'feeship.city_id', '=', 'city.id')
                            ->select('feeship.*', 'city.name')
                            ->first();
                        }
                    }
                    return view('backend.shipping.table-shipping', compact('dataCity'));
            }
    }

    public function managerShippingUpdate(Request $request)
    {
        $cityId = $request->input('city-id');
        $update = FeeShip::where('city_id', $cityId)
                    ->update([
                            'fee' => $request->input('price-fee'),
                        ]);
        if( $update)
        {
            return number_format($request->input('price-fee'));
        }
    }
}
