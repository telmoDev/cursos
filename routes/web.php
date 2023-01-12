<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TemaController;
use App\Http\Livewire\AdministradorComponent;
use App\Http\Livewire\Cursos\EvaluacionAdmin;
use App\Http\Livewire\Cursos\EvaluacionCrearEditar;
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

// http://127.0.0.1:8000/img-bg/cursos/prueba-4/prueba-4.jpg
Route::get('img-bg/cursos/{folder}/{filename}', function($folder,$filename) {
// Route::get('img-bg/{slug}', function($slug) {
    $path = storage_path()."/app/cursos/{$folder}/{$filename}";
    if(! \File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }
    $file = \File::get($path);
    $type = \File::mimeType($path);

    $response = response()->make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('img.bg.curso');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

  Route::get('/administrador', [AdministradorComponent::class, 'render'])->name('administrador');
  Route::get('/administrador/cursos', [CursoController::class, 'administrador'])->name('curso.administrador');
  Route::get('/administrador/evaluaciones', [CursoController::class, 'evaluacionAdmin'])->name('evaluacion.admin');
  Route::get('/administrador/evaluacion/{id?}', [CursoController::class, 'evaluacionCrearEditar'])->name('evaluacion.crear.editar');

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/usuarios/permisos', [PermissionController::class, 'index'])->name('usuarios.permisos');
    Route::get('/usuarios/roles', [RoleController::class, 'index'])->name('usuarios.roles');
    // Route::get('/curso/{slug}', [RoleController::class, 'index'])->name('curso');
    Route::get("/eventos/administrar",[EventoController::class, "administrar"] )->name("eventos.administrar");
    Route::get('/cursos/crear', [CursoController::class, 'crear'])->name('curso.crear');
    Route::get('/cursos/editar/{id}', [CursoController::class, 'editar'])->name('curso.editar');
    Route::get('contenido/curso/{folder}/download/{folder2}/{filename}', function($folder, $folder2, $filename) {
      $path = storage_path()."/app/cursos/{$folder}/download/{$folder2}/{$filename}";
      $response = response()->download($path);
      return $response;
    })->name('contenido.download.file');
    Route::get('contenido/curso/{folder}/fondo/{folder2}/{filename}', function($folder, $folder2, $filename) {
      $path = storage_path()."/app/cursos/{$folder}/fondo/{$folder2}/{$filename}";
      if(! \File::exists($path)) {
          return response()->json(['message' => 'Image not found.'], 404);
      }
      $file = \File::get($path);
      $type = \File::mimeType($path);

      $response = response()->make($file, 200);
      $response->header("Content-Type", $type);
      return $response;
    })->name('contenido.fondo.img');
});
