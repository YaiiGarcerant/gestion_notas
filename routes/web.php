<?php

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

Route::get('/', function () {
    return view('auth.login');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
| ROUTES PROGRAMAS 
|--------------------------------------------------------------------------
*/

Route::get('programas', [App\Http\Controllers\ProgramasController::class, 'index'])->name('programas')->middleware('auth');

Route::post('programas/create', [App\Http\Controllers\ProgramasController::class, 'store'])->name('programas.create');

Route::post('programas/update/{id}', [App\Http\Controllers\ProgramasController::class, 'update'])->name('programas.update');


Route::get('/programas/destroy/{id}', [App\Http\Controllers\ProgramasController::class, 'destroy'])->name('programas.destroy');


















