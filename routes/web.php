<?php

use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Models\Food;
use App\Models\Menu;
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
    Route::get('admin/menus/create', [MenuController::class, 'create']);
    Route::post('admin/menus/save', [MenuController::class, 'store']);
    Route::get('admin/menus/{id}/edit', [MenuController::class, 'edit']);
    Route::post('admin/menus/{id}', [MenuController::class, 'update']);

    Route::get('admin/foods', [FoodController::class, 'index']);
    Route::get('admin/foods/create', [FoodController::class, 'create']);
    Route::post('admin/foods/save', [MenuController::class, 'store']);
    Route::get('admin/foods/{id}/edit', [MenuController::class, 'edit']);
    Route::post('admin/foods/{id}', [MenuController::class, 'update']);

    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/orders/create', [OrderController::class, 'create']);
    Route::post('admin/orders/save', [OrderController::class, 'store']);
    Route::get('admin/orders/{id}/edit', [OrderController::class, 'edit']);
    Route::post('admin/orders/{id}', [OrderController::class, 'update']);


    Route::get('admin/payments', [PaymentController::class, 'index']);
    Route::get('admin/payments/create', [PaymentController::class, 'create']);
    Route::post('admin/payments/save', [PaymentController::class, 'store']);
    Route::get('admin/payments/{id}/edit', [PaymentController::class, 'edit']);
    Route::post('admin/payments/{id}', [PaymentController::class, 'update']);

    Route::get('admin/ratings', [RatingController::class, 'index']);
    Route::get('admin/ratings/create', [RatingController::class, 'create']);
    Route::post('admin/ratings/save', [RatingController::class, 'store']);
    Route::get('admin/ratings/{id}/edit', [RatingController::class, 'edit']);
    Route::post('admin/ratings/{id}', [RatingController::class, 'update']);

    Route::get('admin/order_details', [OrderDetailController::class, 'index']);
    Route::get('admin/order_details/create', [OrderDetailController::class, 'create']);
    Route::post('admin/order_details', [OrderDetailController::class, 'store']);
    Route::get('admin/order_details/{id}/edit', [OrderDetailController::class, 'edit']);
    Route::post('admin/order_details/{id}', [OrderDetailController::class, 'update']);

});
