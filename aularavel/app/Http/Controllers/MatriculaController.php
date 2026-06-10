<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::with(['disciplina', 'aluno'])->get();
        return view('matricula.index', compact(['matriculas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matricula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matricula = new Matricula();
        $matricula->aluno_id = $request->aluno_id;
        $matricula->curso_id = $request->curso_id;
        $matricula->save();

        return redirect()->route('matricula.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function destroy(string $id)
    {
        $matricula = Matricula::find($id);

        if (isset($matricula)) {
            try {
                $matricula->delete();
            } catch (\Throwable $th) {
                return view('matricula.index');
            }
            return redirect()->route('matricula.index');
        }

        return "<h1>Matricula não encontrada</h1>";
    }
}
