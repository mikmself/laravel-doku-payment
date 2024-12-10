<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('products', [\App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login-page');
Route::get('register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register-page');
