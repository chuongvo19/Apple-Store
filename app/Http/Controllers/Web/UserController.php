<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function editProfile()
    {
        $id = Auth::user()->id;
        $user = User::join('user_address',  'users.id', '=', 'user_address.user_id')
                    ->where('users.id', $id)
                    ->first();
        $categories = Category::all();
        $citys = City::all();
        $district = District::where('id', $user->district_id)->first();
        return view('frontend.user.profile_user', compact('categories', 'user', 'citys', 'district'));
    }
    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate(
        [
            'user-name' => 'required',
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.'id',
            'number-phone' => 'required|numeric'
        ]);
        $user = User::where('id', $id)
            ->update([
                'user_name' => $request->input('user-name'),
                'last_name' => $request->input('last-name'),
                'first_name' => $request->input('first-name'),
                'email' => $request->input('email'),
            ]);
        $city = ($request->input('address') !== null) ? $request->input('address') : 'NULL' ;
        $userAddress = UserAddress::where('user_id', $id)
            ->update([
                'address' => $request->input('address'),
                'district_id' => $request->input('district'),
                'city_id' => $request->input('city'),
            ]);
        if($user && $userAddress)
        {
            return redirect()->back()->with('notification', 'Cập nhật thông tin thành công');
        }else
            {
                return redirect()->back()->with('error', 'Cập nhật thất bại');
            }
    }

    public function showChangePassword()
    {
        $id = Auth::user()->id;
        $categories = Category::all();
        return view('frontend.user.change-password', compact('categories'));
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'confirmed|min:8',
        ]);
        $id = Auth::user()->id;
        $account = User::where('id', $id);
        $passwordOld = $account->select('password')->first()->password;
        if(Hash::check($request->input('old-password'), $passwordOld))
        {
            $hashedPassword = Hash::make($request->input('password'));
            $account->update([
                'password' => $hashedPassword,
            ]);
            return redirect()->back()->with('notification', 'Đổi mật khẩu thành công');
        }else
            {
                return redirect()->back()->with('error', 'Nhập sai mật khẩu cũ');
            }
    }
}
