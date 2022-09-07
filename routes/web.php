<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\AdminOrderController;


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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("products", ProductController::class);
Route::resource("categories", CategoryController::class);
Route::resource("users", UserController::class);
Route::resource("orders", OrderController::class);

Route::resource("checks", CheckController::class);
Route::get('/sorder',[AdminOrderController::class,'index'])->name('sorder');
Route::get('/sorder/create',[AdminOrderController::class,'create'])->name('sorder.create');
Route::post("/sorder", [AdminOrderController::class, "store"])->name("sorder.store");

Route::delete('/sorder/{id}',[AdminOrderController::class,'destroy'])->name('destroy');
