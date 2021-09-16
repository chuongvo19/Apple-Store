<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
