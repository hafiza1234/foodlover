<?php

use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Models\Food;
use Illuminate\Support\Facades\Route;

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
})->name('home');


Route::get('restaurants', function () {
    return view('restaurant');
})->name('restaurants');

Route::get('chinese', function () {
    return view('chinese');
})->name('chinese');

Route::get('fast-food', function () {
    return view('fastfood');
})->name('fast_food');

Route::get('restaurants/{id}', function () {
    return view('restaurant');
})->name('restaurants.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/menus', [MenuController::class, 'index']);
    Route::get('admin/foods', [FoodController::class, 'index']);
    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/payments', [PaymentController::class, 'index']);
    Route::get('admin/ratings', [RatingController::class, 'index']);
    Route::get('admin/order_details', [OrderDetailController::class, 'index']);
});
