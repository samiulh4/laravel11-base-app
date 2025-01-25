<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Facebook\Http\Controllers\FacebookController;

// Auth Route
Route::group(['prefix' => '/facebook', 'middleware'=> ['auth']], function () {
    Route::get('/', [FacebookController::class, 'index']);
});
