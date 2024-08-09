<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\APIController;

Route::get('random-users', [APIController::class, 'getRandomUsers']);
Route::get('token/csrf', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});
Route::resource('notas', NotaController::class);
Route::resource('cursos', CursoController::class);
Route::get('/cursos/materia/{curso}', [CursoController::class, 'materiasDelCurso']);
Route::get('/cursos/estudiantes/{curso}', [CursoController::class, 'estudiantesDelCurso']);
Route::resource('materias', MateriaController::class);
Route::resource('estudiantes', EstudianteController::class);
Route::get('/estudiantes/{estudianteId}/cursos/{cursoId}/notas', [EstudianteController::class, 'notasDeEstudianteYCursospecifico']);
