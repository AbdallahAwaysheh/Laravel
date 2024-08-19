<?php

// use Illuminate\Console\View\Components\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route::resource('/', TaskController::class)
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');


Route::get('/create', [TaskController::class, 'create']);
Route::post('/', [TaskController::class, 'store'])->name('tasks.store');


Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::post('/tasks/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');




