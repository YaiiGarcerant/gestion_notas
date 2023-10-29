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
| ROUTE PROGRAMA
|--------------------------------------------------------------------------
*/

Route::get(
    'programas',
    [App\Http\Controllers\ProgramasController::class, 'index']
)
    ->name('programas')->middleware('auth');

Route::post('programas/create', [App\Http\Controllers\ProgramasController::class, 'store'])->name('programas.create');

Route::post('programas/update/{id}', [App\Http\Controllers\ProgramasController::class, 'update'])->name('programas.update');


Route::get('/programas/destroy/{id}', [App\Http\Controllers\ProgramasController::class, 'destroy'])->name('programas.destroy');



/*
|--------------------------------------------------------------------------
| ROUTE CURSO
|--------------------------------------------------------------------------
*/

Route::get(
    'cursos',
    [App\Http\Controllers\CursoController::class, 'index']
)
    ->name('cursos')->middleware('auth');

Route::post('cursos/create', [App\Http\Controllers\CursoController::class, 'store'])->name('cursos.create');

Route::post('cursos/update/{id}', [App\Http\Controllers\CursoController::class, 'update'])->name('cursos.update');


Route::get('/cursos/destroy/{id}', [App\Http\Controllers\CursoController::class, 'destroy'])->name('cursos.destroy');


/*
|--------------------------------------------------------------------------
| ROUTE MATERIA
|--------------------------------------------------------------------------
*/

Route::get(
    'materias',
    [App\Http\Controllers\MateriasController::class, 'index']
)
    ->name('materias')->middleware('auth');

Route::post('materias/create', [App\Http\Controllers\MateriasController::class, 'store'])->name('materias.create');

Route::post('materias/update/{id}', [App\Http\Controllers\MateriasController::class, 'update'])->name('materias.update');


Route::get('/materias/destroy/{id}', [App\Http\Controllers\MateriasController::class, 'destroy'])->name('materias.destroy');