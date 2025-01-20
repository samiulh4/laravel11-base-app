<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [App\Modules\Web\Http\Controllers\WebController::class, 'index']);
Route::get('/generate', [App\Modules\Web\Http\Controllers\WebController::class, 'generate']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
