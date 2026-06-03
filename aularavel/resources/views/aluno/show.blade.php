@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Detalhes do Aluno',
        'rota' => '',
    ]
)
@section('conteudo')
    <div class="row">
        <div class="col">
            <p><strong>Nome: </strong>{{$aluno->nome}}</p>
            <p><strong>Turma: </strong>{{$aluno->turma}}</p>
            <p><strong>Curso: </strong>{{$aluno->curso->nome}}</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col">
            <a href="{{route('aluno.index')}}" class="btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
        </div>
    </div>
@endsection