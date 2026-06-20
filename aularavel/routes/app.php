<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\MatriculaController;

use Illuminate\Support\Facades\Route;

Route::get('/teste', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home')->middleware(['auth', 'verified']);

Route::resource('/curso', CursoController::class)->middleware(['auth', 'verified']);
Route::resource('/disciplina', DisciplinaController::class)->middleware(['auth', 'verified']);
Route::resource('/aluno', AlunoController::class)->middleware(['auth', 'verified']);

// Route::resource('/matricula', MatriculaController::class);
Route::get('matricula', [MatriculaController::class, 'index'])->name('matricula.index')->middleware(['auth', 'verified']);
Route::get('matricula/create', [MatriculaController::class, 'create'])->name('matricula.create')->middleware(['auth', 'verified']);
Route::post('matricula/store', [MatriculaController::class, 'store'])->name('matricula.store')->middleware(['auth', 'verified']);
Route::delete('matricula/{idAluno}/{idDisciplina}', [MatriculaController::class, 'destroy'])->name('matricula.destroy')->middleware(['auth', 'verified']);
