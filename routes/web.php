<?php

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

Route::get('/import', [\App\Http\Controllers\Import\UsersImportController::class, 'import'])->name('import');

Route::post('/import', [\App\Http\Controllers\Import\UsersImportController::class, 'store'])->name('store');

Route::get('/result', [\App\Http\Controllers\Import\UsersImportController::class, 'show'])->name('result');

Route::delete('/import', [\App\Http\Controllers\Import\UsersImportController::class, 'destroy'])->name('destroy');
