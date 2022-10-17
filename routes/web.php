<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TemaController;
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

Route::get('/', function () { return view('inicio'); })->name("home");
Route::get("/eventos",[EventoController::class, "index"] )->name("eventos.index");
Route::get('/cursos', [CursoController::class, 'list'])->name('curso.list');
Route::get('/curso/{slug}', [CursoController::class, 'index'])->name('curso');
Route::get('/curso/{slug}/tema/{seccion}', [CursoController::class, 'alumno'])->name('curso.seccion');
Route::get('/curso/{slug}/evaluacion', [CursoController::class, 'evaluacion'])->name('curso.evaluacion');

Route::get('/tema-de-interes/{slug}', [TemaController::class, 'list'])->name('tema.list');

Route::get('/autor/{slug}', [AutorController::class, 'list'])->name('autor.list');

Route::get('carrito', [CarritoController::class, 'carrito'] )->name('carrito');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/administrador', [CursoController::class, 'administrador'])->name('curso.administrador');
    Route::get('/usuarios/permisos', [PermissionController::class, 'index'])->name('usuarios.permisos');
    Route::get('/usuarios/roles', [RoleController::class, 'index'])->name('usuarios.roles');
    // Route::get('/curso/{slug}', [RoleController::class, 'index'])->name('curso');
    Route::get("/eventos/administrar",[EventoController::class, "administrar"] )->name("eventos.administrar");
    Route::get('/cursos/crear', [CursoController::class, 'crear'])->name('curso.crear');
    Route::get('/cursos/editar/{id}', [CursoController::class, 'editar'])->name('curso.editar');
});
