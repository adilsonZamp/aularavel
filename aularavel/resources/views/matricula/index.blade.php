@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Lista de Disciplinas',
        'rota' => 'disciplina.create',
    ]
)
@section('conteudo')

    <table class="table align-middle caption-top table-striped">
        <thead>
            <th class="text-secondary">ALUNO</th>
            <th class="d-none d-md-table-cell text-secondary">DISCIPLINA</th>
            <th class="text-secondary">AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->aluno->nome }}</td>
                    <td>{{ $matricula->disciplina->nome }}</td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
