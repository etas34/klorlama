<?php

use App\Http\Controllers\SistemController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix'=>'user','as'=>'user.'],function (){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/edit/{user}', [UserController::class, 'update'])->name('update');
    Route::post('/create', [UserController::class, 'store'])->name('store');
});

Route::group(['prefix'=>'sistem','as'=>'sistem.'],function (){
    Route::get('/', [SistemController::class, 'index'])->name('index');
    Route::get('/create', [SistemController::class, 'create'])->name('create');
    Route::get('/edit/{sistem}', [SistemController::class, 'edit'])->name('edit');
    Route::get('/destroy/{sistem}', [SistemController::class, 'destroy'])->name('destroy');
    Route::post('/edit/{sistem}', [SistemController::class, 'update'])->name('update');
    Route::post('/create', [SistemController::class, 'store'])->name('store');
});
