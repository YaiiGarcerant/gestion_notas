<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});

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
)->name('programas')->middleware('auth');

Route::post(
    'programas/create',
    [App\Http\Controllers\ProgramasController::class, 'store']
)
    ->name('programas.create');
Route::post(
    'programas/update/{id}',
    [App\Http\Controllers\ProgramasController::class, 'update']
)
    ->name('programas.update');
Route::get(
    '/programas/destroy/{id}',
    [App\Http\Controllers\ProgramasController::class, 'destroy']
)
    ->name('programas.destroy');


/*
|--------------------------------------------------------------------------
| ROUTE CURSO
|--------------------------------------------------------------------------
*/

Route::get(
    'cursos',
    [App\Http\Controllers\CursoController::class, 'index']
)->name('cursos')->middleware('auth');

Route::post(
    'cursos/create',
    [App\Http\Controllers\CursoController::class, 'store']
)
    ->name('cursos.create');

Route::post(
    'cursos/update/{id}',
    [App\Http\Controllers\CursoController::class, 'update']
)
    ->name('cursos.update');


Route::get(
    '/cursos/destroy/{id}',
    [App\Http\Controllers\CursoController::class, 'destroy']
)
    ->name('cursos.destroy');


    /*
|--------------------------------------------------------------------------
| ROUTE DOCENTE
|--------------------------------------------------------------------------
*/

Route::get(
    'profesores',
    [App\Http\Controllers\ProfesorController::class, 'index']
)->name('profesores')->middleware('auth');

Route::post(
    'profesores/create',
    [App\Http\Controllers\ProfesorController::class, 'store']
)
    ->name('profesor.create');

Route::post(
    'profesores/update/{id}',
    [App\Http\Controllers\ProfesorController::class, 'update']
)->name('profesor.update');


Route::get('/profesores/destroy/{id}',  [App\Http\Controllers\ProfesorController::class, 'destroy'])->name('profesor.destroy');




/*
|--------------------------------------------------------------------------
| ROUTE ESTUDIANTES
|--------------------------------------------------------------------------
*/

Route::get(
    'estudiantes',
    [App\Http\Controllers\EstudianteController::class, 'index']
)->name('estudiantes')->middleware('auth');

Route::post(
    'estudiantes/create',
    [App\Http\Controllers\EstudianteController::class, 'store']
)
    ->name('estudiantes.create');

Route::post(
    'estudiantes/update/{id}',
    [App\Http\Controllers\EstudianteController::class, 'update']
)
    ->name('estudiantes.update');


Route::get(
    '/estudiantes/destroy/{id}',
    [App\Http\Controllers\EstudianteController::class, 'destroy']
)
    ->name('estudiantes.destroy');



/*
|--------------------------------------------------------------------------
| ROUTE MATERIA
|--------------------------------------------------------------------------
*/

Route::get(
    'materias',
    [App\Http\Controllers\MateriasController::class, 'index']
)->name('materias')->middleware('auth');

Route::post(
    'materias/create',
    [App\Http\Controllers\MateriasController::class, 'store']
)
    ->name('materias.create');

Route::post(
    'materias/update/{id}',
    [App\Http\Controllers\MateriasController::class, 'update']
)
    ->name('materias.update');


Route::get(
    '/materias/destroy/{id}',
    [App\Http\Controllers\MateriasController::class, 'destroy']
)
    ->name('materias.destroy');


/*
|--------------------------------------------------------------------------
| ROUTE NOTAS
|--------------------------------------------------------------------------
*/

Route::get(
    'notas',
    [App\Http\Controllers\NotasController::class, 'index']
)->name('notas')->middleware('auth');

Route::post(
    'notas/create',
    [App\Http\Controllers\NotasController::class, 'store']
)
    ->name('notas.create');

Route::post(
    'notas/update/{id}',
    [App\Http\Controllers\NotasController::class, 'update']
)
    ->name('notas.update');


Route::get(
    '/notas/destroy/{id}',
    [App\Http\Controllers\NotasController::class, 'destroy']
)
    ->name('notas.destroy');


/*
|--------------------------------------------------------------------------
| ROUTE RANKING
|--------------------------------------------------------------------------
*/

Route::get(
    'ranking',
    [App\Http\Controllers\NotasController::class, 'indexRanking']
)->name('ranking')->middleware('auth');

