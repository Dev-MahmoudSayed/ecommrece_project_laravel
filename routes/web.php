<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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


//main website
Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart',[HomeController::class,'remove_cart']);
//admin
Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);
Route::resource('order',OrderController::class);
