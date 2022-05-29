<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::get('/form/{id}', [FormController::class, 'create'])->name('form.create');
Route::post('/form/{id}', [FormController::class, 'store'])->name('form.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
