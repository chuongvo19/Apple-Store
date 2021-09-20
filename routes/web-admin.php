<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    // show page login
    Route::get('auth/login', [AuthenticateController::class, 'showLoginForm'])->name('admin.login')->middleware('logged-out');
    Route::post('auth/login', [AuthenticateController::class, 'login'])->name('admin.authenticate');
    Route::group(['middleware' => ['authenticated-as-admin']], function() {
        // logout
        Route::get('auth/logout', function() {
            Auth::logout();
            return redirect()->route('admin.login');
        })->name('admin.logout');
        // show dashboard
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        // account
        Route::resource('account', AccountController::class);
        Route::get('admin/client-management', [AccountController::class, 'clientIndex'])->name('admin.client.index');
        // change password
        Route::get('account/change-password/{id}', [AccountController::class, 'showChangePassword'])->name('admin.show.change.password');
        Route::put('account/change-password/{id}', [AccountController::class, 'changePassword'])->name('admin.change.password');
    });
});