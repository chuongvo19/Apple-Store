<?php

use App\Http\Controllers\Web\AuthenticateController;
use App\Http\Controllers\Web\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/',  'middleware' => ['must-be-user']], function() {
    
    Route::get('', [IndexController::class, 'index'])->name('frontend.index');
    Route::get('login', [AuthenticateController::class, 'showLoginForm'])->name('frontend.login');
    // login
    Route::post('login', [AuthenticateController::class, 'login'])->name('frontend.authenticate.login');
    // logout
    Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('frontend.login');
    })->name('logout');
});
