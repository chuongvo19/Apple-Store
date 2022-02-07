<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Mail\EmailSentResetPassword;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    //
    public function showLoginForm()
    {
        session()->flash('role-page', 'loginForm');
        return view('frontend.authenticate.login');
    }
    public function login(Request $request)
    {
        // dd($request->input());
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt([
            'role' => '3',
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            ], $request->remember_token ? true : false))
        {
            return redirect()->route('frontend.index');
        }else
            {
                return redirect()->route('frontend.login')->with('error', 'Your email or password is incorrect!');
            }
    }
    public function showRegisterForm()
    {
        session()->flash('role-page', 'register');
        return view('frontend.authenticate.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'user-name' => 'required',
                'first-name' => 'required',
                'last-name' => 'required',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|confirmed',
                'number-phone' => 'required|numeric'
            ]);
        $hashedPassword = Hash::make($request->input('password'));
        $user = User::create([
            'user_name' => $request->input('user-name'),
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'telephone' => $request->input('number-phone'),
            'role' => 3,
        ]);
        if($user)
        {
            UserAddress::create([
                'user_id' => $user->id,
                'city_id' => 100,
                'district_id' => 1000,
            ]);
            return redirect()->route('frontend.login')->with('notification', 'Đăng Ký Tài Khoản Mới Thành Công');
        }else
            {   
                return redirect()->back()->with('notification', 'Đăng Ký Tài Khoản Mới Thất Bại');
            }
    }

    public function showForgotPassword()
    {   
        return view('frontend.authenticate.forgot-password');
    }
    public function forgotPassword(Request $request)
    {
        $checkEmail = User::where('role', '=', 3)
                    ->where('email', $request->input('email'))
                    ->exists();
        // dd($checkEmail);
        if($checkEmail)
        {
            $token = rand(10000000,99999999);
            if(!ResetPassword::where('email', $request->input('email'))->exists())
            {
                ResetPassword::insert([
                    'email' => $request->input('email'),
                    'token' => $token,
                ]);
            }
            $email = $request->input('email');
            session(['email' => $email]);
            session(['confirm' => true]);
            $account = ResetPassword::where('email', $request->input('email'))->first();
            Mail::to($request->input('email'))->send(new EmailSentResetPassword($account));
            return redirect()->route('frontend.show.forgot.password');
        }else
            {
                return redirect()->back()->with('error', 'email của bạn chưa được đăng ký');
            }
    }
    public function resetPasswordFrom(Request $request)
    {
        $validated = $request->validate([
            'token' => 'min:8',
        ]);
        $checkToken = ResetPassword::where('email', $request->input('email'))
                                ->where('token', $request->input('token'))
                                ->exists();
        if($checkToken)
        {
            ResetPassword::where('email', session('email'))->delete();
            return redirect()->route('frontend.show.reset.password');
        }else
            {
                return redirect()->back()->with('error', 'sai mã xác thực');
            }
    }
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'confirmed|min:8',
        ]);
        
        $hashedPassword = Hash::make($request->input('password'));
        User::where('email', session('email'))
            ->update([
                'password' => $hashedPassword,
            ]);
        session()->forget('email');
        session()->forget('confirm');
        return redirect()->route('frontend.login')->with('notification', 'Bạn đã thay đổi mật khẩu thành công');
    }
    public function showResetPassword()
    {
        return view('frontend.authenticate.reset-password');
    }
}
