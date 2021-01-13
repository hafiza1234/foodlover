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
});

Route::get('/foods', function() {
 	return view('homepage');
});

Route::get('resturants',function() {
	return view('resturant');
});

Route::get('fastfoods',function() {
	return view('fastfood');
});

Route::get('chineses',function() {
	return view('chinese');
});

Route::get('homemades',function() {
	return view('homemade');
});

Route::get('contactus',function() {
	return view('contactus');
});

Route::get('privacy',function() {
	return view('privacy');
});

Route::get('security',function() {
	return view('security');
});

Route::get('Terms',function() {
	return view('Terms');
});

Route::get('index',function() {
	return view('index');
});