<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function selectAddress($id)
    {
        $cityId = $id;
        $output = '';
        $selectDistrict = District::where('city_id', $cityId)->get();
        foreach($selectDistrict as $value)
        {
            $output .= '<option value="'.$value['id'].'">'. $value['name'].'</option>';
        }
        return $output;
    }
}
