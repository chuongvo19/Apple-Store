<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('frontend.authenticate.layouts.app');
    }
}
