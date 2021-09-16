<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    //
    public function showLoginForm()
    {
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
            return view('frontend.index');
        }else
            {
                return redirect()->route('frontend.login')->with('error', 'Your email or password is incorrect!');
            }
    }
}
