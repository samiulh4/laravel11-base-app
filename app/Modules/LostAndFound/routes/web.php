<?php

use Illuminate\Support\Facades\Route;
use App\Modules\LostAndFound\Http\Controllers\LostAndFoundWebController;

Route::group(['prefix' => '/lost-and-found'], function () {
    Route::get('/', [LostAndFoundWebController::class, 'index']);
});
Route::group(['prefix' => '/lost-and-found', 'middleware'=> ['auth']], function () {
    Route::get('/post/create', [LostAndFoundWebController::class, 'postCreate']);
});