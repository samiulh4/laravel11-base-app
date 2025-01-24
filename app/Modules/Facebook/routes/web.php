<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Facebook\Http\Controllers\FacebookWebController;

// Auth Route
Route::group(['prefix' => '/facebook', 'middleware'=> ['auth']], function () {
    Route::get('/', [FacebookWebController::class, 'index']);
});
