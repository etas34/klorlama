<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SistemController;
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
    });


    Route::group(['prefix'=>'user','as'=>'user.'],function (){
        Route::post('/store', [UserController::class, 'store'])->name('store');
    });




});

