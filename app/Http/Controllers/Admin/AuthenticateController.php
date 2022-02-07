<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EmailSentResetPassword;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.authenticate.login');
    }
    public function login(Request $request)
    {
        // dd($request->input());
        if (Auth::attempt([
            'role' => '1',
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            ], $request->remember_token ? true : false))
        {
            return redirect()->route('admin.dashboard');
        }else if (Auth::attempt([
            'role' => '2',
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            ], $request->remember_token ? true : false))
            {
                return redirect()->route('admin.dashboard');
            }else   
                {
                    return redirect()->route('admin.login')->with('error', 'Your email or password is incorrect!');
                }
    }

    public function showForgotPassword()
    {   
        return view('backend.authenticate.forgot-password');
    }
    public function forgotPassword(Request $request)
    {
        $checkEmail = User::where('role', '<', 3)
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
            return redirect()->route('auth.show.forgot.password');
        }else
            {
                return redirect()->back()->with('error', 'email của bạn chưa được đăng ký quyền admin');
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
            return redirect()->route('auth.show.reset.password');
        }else
            {
                return redirect()->back()->with('error', 'sai mã code');
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
        return redirect()->route('admin.login')->with('notification', 'Bạn đã thay đổi mật khẩu thành công');
    }
    public function showResetPassword()
    {
        return view('backend.authenticate.reset-password');
    }
}
