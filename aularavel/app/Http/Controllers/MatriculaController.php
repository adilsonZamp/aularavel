<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Matricula;
use Illuminate\Support\Facades\Gate;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Matricula::class);
        $matriculas = Matricula::with(['disciplina', 'aluno'])->get();
        return view('matricula.index', compact(['matriculas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Matricula::class);
        $alunos = Aluno::all();
        $disciplinas = Disciplina::all();

        return view('matricula.create', compact(['disciplinas', 'alunos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Matricula::class);
        $matricula = new Matricula();
        $matricula->aluno_id = $request->aluno;
        $matricula->disciplina_id = $request->disciplina;
        $matricula->save();

        return redirect()->route('matricula.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('sem uso');
        $matricula = Matricula::find($id);

        if (isset($matricula)) {
            return redirect()->route('matricula.index');
        }

        return "<h1>Matricula não encontrada</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd('sem uso');
        $matricula = Matricula::find($id);

        if (isset($matricula)) {
            return redirect()->route('matricula.index');
        }

        return "<h1>Matricula não encontrada</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('sem uso');
        $matricula = Matricula::find($id);

        if (isset($matricula)) {
            $matricula->aluno_id = $request->aluno_id;
            $matricula->curso_id = $request->curso_id;
            $matricula->save();

            return redirect()->route('matricula.index');
        }

        return "<h1>Matricula não encontrada</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $idAluno, int $idDisciplina)
    {
        try {
            $matricula = Matricula::where('disciplina_id', $idDisciplina)->where('aluno_id', $idAluno);
            Gate::authorize('delete', $matricula);
            $matricula->delete();
        } catch (\Throwable $th) {
            return redirect()->route('matricula.index');
        }
        return redirect()->route('matricula.index');
    }
}
