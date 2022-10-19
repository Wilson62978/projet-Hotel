<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/chambres', [HomeController::class, 'chambres'])
    ->name('chambres.all');

Route::get('/chambres/{slug}', [HomeController::class, 'firstChambre'])
    ->name('chambres.first');

Route::get('chambre-checkout/{id}', [HomeController::class, 'checkout'])
    ->name('chambres.checkout');

Route::get('/reserver-chambres', [HomeController::class, 'booknow'])
    ->name('reserver');

Route::get('/cotations/demande', [HomeController::class, 'cotationCreate'])
    ->name('cotations.create');
Route::get('/cotations/{slug}', [HomeController::class, 'cotationView'])
    ->name('cotations.view');

Route::post('/cotations/store', [HomeController::class, 'cotationStore'])
    ->name('cotations.store');
