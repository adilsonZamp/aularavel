<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\MatriculaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/curso', CursoController::class);
Route::resource('/disciplina', DisciplinaController::class);
Route::resource('/aluno', AlunoController::class);
// Route::resource('/matricula', MatriculaController::class);

Route::get('matricula', [MatriculaController::class, 'index'])->name('matricula.index');
Route::get('matricula/create', [MatriculaController::class, 'create'])->name('matricula.create');
Route::post('matricula/store', [MatriculaController::class, 'store'])->name('matricula.store');
Route::delete('matricula/{idAluno}/{idDisciplina}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');
