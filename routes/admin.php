<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CotationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ReservationsController;

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
 
    Route::get("",[AdminController::class, 'index'])->name("admin");
    Route::resource('/reductions', ReductionController::class);
    Route::resource('/evenements', EvenementController::class);
    Route::resource('/demandes', CotationController::class);
    Route::resource('/reservations', ReservationsController::class);
    // chambres
    Route::resource('/chambre', ChambreController::class);
    Route::post('/chambre/published', [ChambreController::class, 'updatePublished'])->name('chambre.published');
});
    

// uploaded files
Route::any('/uploaded-files/file-info', [UploadController::class, 'fileInfo'])->name('uploaded-files.info');
Route::resource('/uploaded-files', UploadController::class);

Route::post('/uploader', [UploadController::class, 'showUploader']);
Route::post('/uploader/upload', [UploadController::class, 'upload']);
Route::get('/uploader/get_uploaded_files', [UploadController::class, 'getUploadedFiles']);
Route::post('/uploader/get_file_by_ids', [UploadController::class, 'getPreviewFiles']);


