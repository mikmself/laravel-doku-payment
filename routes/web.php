<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('products', [\App\Http\Controllers\HomeController::class, 'products'])->name('products');
