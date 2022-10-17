<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReductionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin'], function () {
    Route::resource('/reductions', ReductionController::class);
    Route::resource('/evenements', EvenementController::class);
});

// uploaded files
    Route::any('/uploaded-files/file-info', [UploadController::class, 'fileInfo'])->name('uploaded-files.info');
    Route::resource('/uploaded-files', UploadController::class);

    Route::post('/uploader', [UploadController::class, 'showUploader']);
    Route::post('/uploader/upload', [UploadController::class, 'upload']);
    Route::get('/uploader/get_uploaded_files', [UploadController::class, 'getUploadedFiles']);
    Route::post('/uploader/get_file_by_ids', [UploadController::class, 'getPreviewFiles']);


    Route::post('/categorie-childrens', [CategorieController::class, 'categorieChildrens'])->name('categorie.childrens');
