<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerMenuController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('restaurants', [RestaurantController::class, 'index'])->name('restaurants');

Route::get('restaurants/menus', [RestaurantController::class, 'menus'])->name('restaurants.menus');

Route::get('menu-type/chinese', [CustomerMenuController::class, 'chinese'])->name('chinese');
Route::get('menu-type/fast-food', [CustomerMenuController::class, 'fastFood'])->name('fast_food');
Route::get('menu-type/homemade', [CustomerMenuController::class, 'homemade'])->name('homemade');
Route::get('menu-type/homemade', [CustomerMenuController::class, 'homemade'])->name('homemade');
Route::get('menu/{id}/details', [CustomerMenuController::class, 'details'])->name('menu.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('my-account', [AccountController::class, 'account'])->middleware('auth');
Route::post('my-account', [AccountController::class, 'updateAccount'])->middleware('auth');
Route::get('cart/{id}/add', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::get('cart/{id}/remove', [CartController::class, 'removeFromCart'])->middleware('auth')->name('cart.remove');
Route::get('cart/details', [CartController::class, 'show'])->middleware('auth')->name('cart.show');
Route::post('cart/order', [CartController::class, 'placeOrder'])->middleware('auth')->name('cart.order');

Route::get('my-orders', [CustomerOrderController::class, 'index'])->middleware('auth');
Route::get('my-orders/{id}', [CustomerOrderController::class, 'show'])->middleware('auth')->name('my-order.show');
Route::get('my-orders/{id}/cancel', [CustomerOrderController::class, 'cancel'])->middleware('auth')->name('my-order.cancel');

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
