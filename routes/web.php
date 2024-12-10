<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('products', [\App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login-page');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register-page');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/checkout/{product}', [\App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
});
