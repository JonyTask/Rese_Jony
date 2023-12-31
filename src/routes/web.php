<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GourmetController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\SearchController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/',[GourmetController::class,'ViewGourmets']);
    Route::post('/favorite_gourmet',[FavoriteController::class,'ControlFavorite']);
    Route::get('/gourmet_detail',[GourmetController::class,'ViewDetail']);
    Route::post('/detail/reserve',[ReserveController::class,'ReservationDone']);
    Route::get('gourmet_search',[SearchController::class,'SearchScope']);
});