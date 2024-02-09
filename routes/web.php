<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;

/*
 |--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });




Route::get('/',[HomeController::class,'index']);


    Route::middleware([
       'auth'
        ])->group(function () {
    //main website
   Route::get('/redirect',[HomeController::class,'redirect']);
    Route::get('/product_details/{id}',[HomeController::class,'product_details']);
    Route::post('/cart/{id}',[HomeController::class,'add_cart']);
    Route::get('/show_cart',[HomeController::class,'show_cart'])->name('cart.show');
    Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
    Route::post('/logout',[HomeController::class,'logout'])->name('logout');

    //admin
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('order',OrderController::class);
    Route::get('coupons',[CouponController::class,'index'])->name('coupons');
    Route::get('coupons/create',[CouponController::class,'create'])->name('coupons.create');
    Route::post('coupons/store',[CouponController::class,'store'])->name('coupons.store');
    Route::post('coupons/check',[CouponController::class,'check'])->name('coupons.check');
    Route::delete('coupons/{coupon}/delete',[CouponController::class,'delete'])->name('coupons.delete');
    //payment
    Route::post('paypal',[PaypalController::class,'paypal'])->name('paypal');
    Route::get('success',[PaypalController::class,'success'])->name('success');
    Route::get('cancel',[PaypalController::class,'cancel'])->name('cancel');
});
