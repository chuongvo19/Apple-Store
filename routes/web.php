<?php

use App\Http\Controllers\Web\AddressController;
use App\Http\Controllers\Web\AuthenticateController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\PlaceOrderController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\ResetPassword;

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



Route::group(['prefix' => '/',], function() {
    
    Route::get('login', [AuthenticateController::class, 'showLoginForm'])->name('frontend.login');

    Route::middleware('must-be-user')->group(function() {
        // index
        Route::get('', [IndexController::class, 'index'])->name('frontend.index');
        Route::post('search', [IndexController::class, 'indexSearch'])->name('frontend.index.search');
        // end index
        Route::post('sort-index', [IndexController::class, 'sortIndexAsc'])->name('index.sort');
        // login
        Route::post('login', [AuthenticateController::class, 'login'])->name('frontend.authenticate.login');
        // logout
        Route::get('logout', function() {
            Auth::logout();
            return redirect()->route('frontend.login');
        })->name('logout');
        // 
        Route::get('user/forgot-password', [AuthenticateController::class, 'showForgotPassword'])->name('frontend.show.forgot.password');
        Route::post('user/forgot-password', [AuthenticateController::class, 'forgotPassword'])->name('frontend.forgot.password');
        Route::post('user/reset-password-form', [AuthenticateController::class, 'resetPasswordFrom'])->name('frontend.reset.password.form');
        Route::get('user/reset-password', [AuthenticateController::class, 'showResetPassword'])->name('frontend.show.reset.password');
        Route::post('user/reset-password', [AuthenticateController::class, 'resetPassword'])->name('frontend.reset.password');
        Route::get('user/back-to-email', function(){
            ResetPassword::where('email', session('email'))->delete();
            session()->forget('email');
            session()->forget('confirm');
            return redirect()->back();
        })->name('frontend.back.to.email');
        // 
        Route::get('register', [AuthenticateController::class, 'showRegisterForm'])->name('frontend.showRegisterForm');
        Route::post('register', [AuthenticateController::class, 'register'])->name('frontend.register');
        // categories
        Route::get('categories/{id}', [CategoryController::class, 'index'])->name('frontend.category.index');
        Route::get('categories/sort-asc/{id}', [CategoryController::class, 'indexSortAsc'])->name('frontend.category.index.asc');
        Route::get('categories/sort-desc/{id}', [CategoryController::class, 'indexSortDesc'])->name('frontend.category.index.desc');
        // Route::post('sort-categories', [CategoryController::class, 'sortCategory'])->name('frontend.categories.sort');
        // Product
        Route::get('product/{id}',[ProductController::class, 'show'])->name('frontend.product.show');
        // Cart
        Route::post('add-to-cart', [CartController::class, 'addToCart']);
        Route::get('cart/products', [CartController::class, 'reloadProductsInCardPage'])->name('frontend.cart.reload-products-in-cardpage');
        Route::get('deleteProductCart/{sessionId}', [CartController::class, 'deleteListCart'])->name('frontend.cart.delete.product');
        Route::get('listCart', [CartController::class, 'showListCart'])->name('frontend.cart.list-cart');
        // check out
        Route::get('check-out', [CartController::class, 'showCheckOut'])->name('frontend.cart.check-out')->middleware('auth');
        // contact
        Route::get('contact', [ContactController::class, 'showContact'])->name('frontend.show.contact');
        Route::post('cart/update-quantity', [CartController::class, 'updateCartQuantity'])->name('frontend.cart.updateCartQuantity');
        // edit user
        Route::get('user/profile', [UserController::class, 'editProfile'])->name('frontend.user.profile')->middleware('auth');
        Route::post('user/edit-profile', [UserController::class, 'updateProfile'])->name('frontend.user.update-profile')->middleware('auth');
        // change password
        Route::get('user/change-password', [UserController::class, 'showChangePassword'])->name('user.show.change.password')->middleware('auth');
        Route::post('user/change-password', [userController::class, 'changePassword'])->name('user.change.password')->middleware('auth');
        // select address
        Route::get('select-city/{id}', [AddressController::class, 'selectAddress'])->middleware('auth');
        Route::get('change-fee-ship/{id}', [CartController::class, 'feeShipUpdate'])->middleware('auth');
        // place order
        Route::post('cart/place-order', [PlaceOrderController::class, 'placeOrder'])->name('frontend.cart.place.order')->middleware('auth');
        // SHOW  order
        Route::get('user/show-order', [PlaceOrderController::class, 'showOrder'])->name('frontend.show.order')->middleware('auth');
        // show order item
        Route::get('user/show-order-item/{id}', [PlaceOrderController::class, 'showOrderItem'])->name('frontend.show.order.item')->middleware('auth');
    });

});
