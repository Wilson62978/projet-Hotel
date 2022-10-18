<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CotationController;
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
 
    Route::view("","backend.dashboard")->name("admin");
    Route::resource('/reductions', ReductionController::class);
    Route::resource('/evenements', EvenementController::class);
    Route::resource('/demandes', CotationController::class);
  
 

});
