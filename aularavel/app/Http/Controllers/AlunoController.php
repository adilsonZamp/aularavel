<?php

namespace App\Http\Controllers;

use App\Http\Requests\Aluno\AlunoCreateRequest;
use App\Http\Requests\Aluno\AlunoUpdateRequest;
use App\Models\Curso;
use App\Models\Aluno;
use Illuminate\Support\Facades\Gate;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Aluno::class);
        $data = Aluno::all();
        return view('aluno.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Aluno::class);
        $cursos = Curso::all();
        return view('aluno.create', compact(['cursos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoCreateRequest $request)
    {
        Gate::authorize('create', Aluno::class);
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
        
        Gate::authorize('view', $aluno);

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

        Gate::authorize('update', $aluno);

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

        Gate::authorize('update', $aluno);

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

        Gate::authorize('delete', $aluno);

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
