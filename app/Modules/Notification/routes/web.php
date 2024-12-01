<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Notification\Http\Controllers\NotificationController;

Route::group(['prefix' => '/admin/message', 'middleware'=> ['auth']], function () {
    Route::get('/index', [NotificationController::class, 'adminMessageIndex']);
    Route::get('/create', [NotificationController::class, 'adminMessageCreate']);
    
});
Route::group(['prefix' => '/admin/chat', 'middleware'=> ['auth']], function () {
    Route::get('/index', [NotificationController::class, 'adminChatIndex']);
    Route::post('/store', [NotificationController::class, 'adminChatStore']);
    Route::get('/test', [NotificationController::class, 'testSocket']);
});
