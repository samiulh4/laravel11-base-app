<?php


use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Http\Controllers\AuthenticationAdminController;


Route::group(['prefix' => '/admin'], function () {
    Route::get('/sign-up', [AuthenticationAdminController::class, 'adminSignUp']);
    Route::get('/sign-in', [AuthenticationAdminController::class, 'adminSignIn']);
});

Route::post('/sign-up/store', [AuthenticationAdminController::class, 'signUpStore']);
Route::post('/sign-in/action', [AuthenticationAdminController::class, 'signInAction']);
