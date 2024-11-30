<?php

use Illuminate\Support\Facades\Route;
use App\Modules\User\Http\Controllers\UserController;

Route::group(['prefix' => '/admin/user', 'middleware'=> ['auth']], function () {
    Route::get('/edit-my-profile', [UserController::class, 'editMyProfile']);
    Route::post('/save-my-profile', [UserController::class, 'saveMyProfile']);
});
