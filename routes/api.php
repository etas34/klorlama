<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SistemController;
use App\Http\Controllers\SmsLogController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/il', [ApiController::class, 'getil']);
    Route::get('/ilce', [ApiController::class, 'getilce']);
    Route::get('/sistem', [ApiController::class, 'getsistem']);

    Route::group(['prefix'=>'sistem','as'=>'sistem.'],function (){
        Route::post('/store', [SistemController::class, 'store'])->name('store');
        Route::post('/update/{sistem}', [SistemController::class, 'update'])->name('update');
        Route::post('/zaman-asim/{sistem}' , [SistemController::class, 'zamanAsim'] )->name('zamanAsim');
        Route::post('/yasakli-zaman/{sistem}' , [SistemController::class, 'yasakliZaman'] )->name('yasakliZaman');
        Route::post('/klor-atim-sure/{sistem}' , [SistemController::class, 'klorAtimSure'] )->name('klorAtimSure');
    });


    Route::group(['prefix'=>'user','as'=>'user.'],function (){
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
    });




});


Route::post('/smslog-br7u10fkoiee3nbmkxno',[SmsLogController::class, 'store'] );
