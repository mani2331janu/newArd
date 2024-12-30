<?php

use App\Http\Controllers\FoodItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('login');



Route::get('/home', [LoginController::class, 'home'])->middleware('auth');
Route::post('/store', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/menu', [LoginController::class, 'menu'])->name('menu')->middleware('auth');
Route::get('/add', [LoginController::class, 'add'])->name('add');

// Password reset routes
Route::get('/password/request', [PasswordResetController::class, 'showRequestForm'])->name('password.request');
Route::post('/password/email', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');

// get cate and item
Route::get('/get-cate', [FoodItemController::class, 'getCate'])->name('food-cate');
Route::get('/api/food-item', [FoodItemController::class, 'getItem'])->name('food-item');



// Order submission
Route::post('/submit-order', [OrderController::class, 'store']);

// Table route
Route::get('/table', [TableController::class, 'show'])->name('table')->middleware('auth');


