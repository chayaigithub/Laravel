<?php

use App\Models\Dashboard;
use App\Models\Orders;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/view-orders', [OrdersController::class, 'orders'])->name('orders');

Route::get('/add-orders', [OrdersController::class, 'addorders'])->name('addorders');

Route::post('/dashboard', [OrdersController::class, 'store'])->name('store');

Route::get('/view-orders/{order}/edit', [OrdersController::class, 'edit'])->name('order.edit');

Route::put('/view-orders/{order}', [OrdersController::class, 'update'])->name('order.update');

Route::delete('/view-orders/{order}', [OrdersController::class, 'delete'])->name('order.delete');



// Login/Register

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');