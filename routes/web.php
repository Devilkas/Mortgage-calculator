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
Route::get('/', function () {
    return redirect('/banks');
});

Route::resource('/banks', \App\Http\Controllers\BankController::class);
Route::get('/calculator', [\App\Http\Controllers\CalculatorController::class, 'index'])->name('calculator');
