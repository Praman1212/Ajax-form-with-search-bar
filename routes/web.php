<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('crud', CrudController::class);

Route::resource('coach',CoachController::class);

Route::get('/search',[CrudController::class,'search']);

// Route::get('/partialView',[CrudController::class,'partialIndex'])->name('partialView');


