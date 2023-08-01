<?php

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
    return view('welcome');
});


Route::prefix('user')->group(function(){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('add', [UserController::class, 'store'])->name('user.add');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
});
