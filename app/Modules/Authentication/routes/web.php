<?php


use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Http\Controllers\AuthenticationAdminController;

Route::group(['prefix' => '/admin'], function () {
    Route::get('/sign-up', [AuthenticationAdminController::class, 'signUp']);
});