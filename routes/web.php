<?php

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
    return view('restaurant');
})->name('chinese');

Route::get('restaurants', function () {
    return view('restaurant');
})->name('restaurants');

Route::get('restaurants/{id}', function () {
    return view('restaurant');
})->name('restaurants.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
