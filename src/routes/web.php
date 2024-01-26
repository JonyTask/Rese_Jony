<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GourmetController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[GourmetController::class,'ViewGourmets']);
Route::get('/Detail',[GourmetController::class,'ViewDetail']);
Route::get('Search',[SearchController::class,'SearchScope']);

Route::middleware(['auth'])->group(function () {
    Route::post('/AddFavorite',[FavoriteController::class,'ControlFavorite']);
    Route::post('/Detail/Reserve',[ReserveController::class,'ReservationDone']);
    Route::get('/Mypage',[GourmetController::class,'ViewMyPage']);
    Route::get('Mypage/Reserve/Delete/Confirmation',[ReserveController::class,'ReservationDeleteConfirm'])->name('delete.confirm');
    Route::post('Mypage/Reserve/Delete',[ReserveController::class,'ReservationDelete']);
});

Route::post('/register',[AuthController::class,'store']);

/* ---------- 管理者認証ルーティング -------------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin_login',[AuthController::class,'viewAdminLogin'])->name('admin.login');
Route::post('/admin_login',[AuthController::class, 'AdminStoreAuth']);
Route::post('/admin_logout',[AuthController::class,'DestroyAdmin']);
Route::middleware('auth:admin')->group(function (){
    Route::get('/admin',[AdminController::class,'ViewAdmin'])->name('admin.auth_complete');
    Route::post('/admin_delete',[AdminController::class,'DeleteGourmet'])->name('admin.delete_gourmet');
});