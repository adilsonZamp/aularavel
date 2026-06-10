<?php

namespace App\Http\Controllers;

use App\Http\Requests\Aluno\AlunoCreateRequest;
use App\Http\Requests\Aluno\AlunoUpdateRequest;
use App\Models\Curso;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Aluno::all();
        return view('aluno.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', compact(['cursos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoCreateRequest $request)
    {
        $validacao = $request->validated();
        Aluno::create($validacao);

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::find($id);

        if (isset($aluno)) {
            return view('aluno.show', compact(['aluno']));
        }

        return "<h1>Aluno não encontrado</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $cursos = Curso::all();

        if (isset($aluno) && isset($cursos)) {
            return view('aluno.edit', compact(['aluno', 'cursos']));
        }

        return "<h1>Aluno não encontrado</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoUpdateRequest $request, string $id)
    {
        $aluno = Aluno::find($id);

        if (isset($aluno)) {
            $aluno->update($request->validated());
            return redirect()->route('aluno.index');
        }

        return "<h1>Aluno não encontrado</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);

        if (isset($aluno)) {
            try {
                $aluno->delete();
            } catch (\Throwable $th) {
                return redirect()->route('aluno.index')->with('erro', 'Existem matrículas que dependem desse aluno, para desinscrever ele é necessário revogar as matrículas');
            }
            return redirect()->route('aluno.index');
        }

        return "<h1>Aluno não encontrado</h1>";
    }
}
