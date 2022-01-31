<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () { return view('inicio'); });
Route::get("/eventos",[EventoController::class, "index"] )->name("eventos.index");

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/usuarios/permisos', [PermissionController::class, 'index'])->name('usuarios.permisos');
    Route::get('/usuarios/roles', [RoleController::class, 'index'])->name('usuarios.roles');
    Route::get('/curso/{slug}', [RoleController::class, 'index'])->name('curso');
    Route::get("/eventos/administrar",[EventoController::class, "administrar"] )->name("eventos.administrar");
});
