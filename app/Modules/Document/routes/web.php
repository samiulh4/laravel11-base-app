<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Document\Http\Controllers\DocumentUploadController;


Route::group(['prefix' => '/admin/document', 'middleware'=> ['auth']], function () {
    Route::get('/upload-file', [DocumentUploadController::class, 'uploadFile']);
    Route::post('/upload-file/store', [DocumentUploadController::class, 'uploadFileStore']);
});
