<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'fetchProductData']);


Route::get('/terms', function () {
    return view('terms');
});
Route::get('/explore', function () {
    return view('explore');
});
Route::get('/feed', function () {
    return view('feed');
});
Route::get('/support', function () {
    return view('support');
});
Route::get('/setting', function () {
    return view('setting');
});
