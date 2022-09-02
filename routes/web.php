<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
<<<<<<< HEAD
use App\Http\Controllers\OrdersController;
=======
>>>>>>> 9588aa0576a12669146d76fe2177423079ed6232

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("products", ProductController::class);
Route::resource("categories", CategoryController::class);
<<<<<<< HEAD
Route::resource("orders" , OrdersController::class );
// Route::get("orders/{id}" , OrdersController::class );
=======
>>>>>>> 9588aa0576a12669146d76fe2177423079ed6232
