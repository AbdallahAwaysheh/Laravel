<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/', [MovieController::class, 'store'])->name('movies.store');
Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

