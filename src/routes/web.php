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
    Route::post('/AddFavorite',[FavoriteController::class,'ControlFavorite']);
    Route::get('/Detail',[GourmetController::class,'ViewDetail']);
    Route::post('/Detail/Reserve',[ReserveController::class,'ReservationDone']);
    Route::get('Search',[SearchController::class,'SearchScope']);
    Route::get('/Mypage',[GourmetController::class,'ViewMyPage']);
    Route::get('Mypage/Reserve/Delete/Confirmation',[ReserveController::class,'ReservationDeleteConfirm'])->name('delete.confirm');
    Route::post('Mypage/Reserve/Delete',[ReserveController::class,'ReservationDelete']);
});