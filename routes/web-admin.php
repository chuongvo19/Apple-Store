<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\StatisticalController;
use App\Http\Middleware\Authenticate;
use App\Models\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    // show page login
    Route::get('auth/login', [AuthenticateController::class, 'showLoginForm'])->name('admin.login')->middleware('logged-out');
    Route::post('auth/login', [AuthenticateController::class, 'login'])->name('admin.authenticate');
    Route::get('auth/forgot-password', [AuthenticateController::class, 'showForgotPassword'])->name('auth.show.forgot.password');
    Route::post('auth/forgot-password', [AuthenticateController::class, 'forgotPassword'])->name('auth.forgot.password');
    Route::post('auth/reset-password-form', [AuthenticateController::class, 'resetPasswordFrom'])->name('auth.reset.password.form');
    Route::get('auth/reset-password', [AuthenticateController::class, 'showResetPassword'])->name('auth.show.reset.password');
    Route::post('auth/reset-password', [AuthenticateController::class, 'resetPassword'])->name('auth.reset.password');
    Route::get('auth/back-to-email', function(){
        ResetPassword::where('email', session('email'))->delete();
        session()->forget('email');
        session()->forget('confirm');
        return redirect()->back();
    })->name('back.to.email');
    // group admin
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
        Route::get('account/delete/{id}', [CategoryController::class, 'destroy'])->name('account.delete');
        Route::get('admin/client-management', [AccountController::class, 'clientIndex'])->name('admin.client.index');
        Route::get('admin/rights', [AccountController::class, 'adminRights'])->name('admin.rights');
        Route::get('admin/change-role/{id}', [AccountController::class, 'changeRole']);
        // search admin
        Route::get('account/search/admin', [AccountController::class, 'searchAdmin'])->name('account.search.admin');
        // search client
        Route::get('account/search/client', [AccountController::class, 'searchClient'])->name('account.search.client');
        // change password
        Route::get('account/change-password/{id}', [AccountController::class, 'showChangePassword'])->name('admin.show.change.password');
        Route::put('account/change-password/{id}', [AccountController::class, 'changePassword'])->name('admin.change.password');
        // category
        Route::resource('categories', CategoryController::class);
        Route::get('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
        // search category
        Route::get('categories/search/find', [CategoryController::class, 'searchCategory'])->name('categories.search');
        // product
        Route::resource('products', ProductController::class);
        Route::get('prodcuts/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
        // search product
        Route::get('products/search/sort', [ProductController::class, 'searchProduct'])->name('products.search');
        // sort product
        Route::get('products/sort', [ProductController::class, 'sortProduct'])->name('products.sort');
        // shipping
        Route::get('manager/shipping', [ShippingController::class, 'showManagerShipping'])->name('admin.manager.shipping');
        Route::post('manager/shipping/city', [ShippingController::class, 'showManagerShippingCity'])->name('admin.manager.shipping.city');
        Route::post('manager/shipping/update/fee', [ShippingController::class, 'managerShippingUpdate'])->name('admin.manager.shipping.update');
        // manager order
        Route::get('order', [OrderController::class, 'showOrder'])->name('admin.manager.order');
        // manager order item
        Route::get('order-item/{id}', [OrderController::class, 'showOrderItem'])->name('admin.manager.order.item');
        // delete order
        Route::get('order-delete/{id}', [OrderController::class, 'deleteOrder'])->name('admin.delete.order');
        // change status order
        Route::post('order-change', [OrderController::class, 'changeStatusOrder'])->name('admin.change.status.order');
        // statistical
        Route::get('statistical', [StatisticalController::class, 'showStatistical'])->name('admin.show.statistical');
        // fillter statistical
        Route::post('statistical/fillter', [StatisticalController::class, 'showStatisticalFillter'])->name('admin.show.statistical.fillter');
    });
});