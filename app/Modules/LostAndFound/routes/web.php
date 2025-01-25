<?php

use Illuminate\Support\Facades\Route;
use App\Modules\LostAndFound\Http\Controllers\LostAndFoundWebController;

// Without Auth
Route::group(['prefix' => '/lost-and-found'], function () {
    Route::get('/', [LostAndFoundWebController::class, 'index']);
    Route::get('/post/detail/{slug}/{encodeId}', [LostAndFoundWebController::class, 'postDetail']);
});
// With Auth
Route::group(['prefix' => '/lost-and-found', 'middleware'=> ['auth']], function () {
    Route::get('/post/create', [LostAndFoundWebController::class, 'postCreate']);
    Route::get('/post/edit/{encodeId}', [LostAndFoundWebController::class, 'postEdit']);
    Route::post('/post/store', [LostAndFoundWebController::class, 'postStore']);
    Route::put('/post/update/{encodeId}', [LostAndFoundWebController::class, 'postUpdate']);
});