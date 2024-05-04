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
    return view('welcome');
});
Route::get('/cronograma',[App\Http\Controllers\Web\CronogramaController::class,'index'])->name('cronograma.index');
Route::get('/cronograma/create',[App\Http\Controllers\Web\CronogramaController::class,'create'])->name('cronograma.create');
Route::post('/cronograma/store',[App\Http\Controllers\Web\CronogramaController::class,'store'])->name('cronograma.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
