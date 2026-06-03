@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Novo Aluno',
        'rota' => '',
    ]
)
@section('conteudo')
    <form action="{{route('aluno.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control @error('nome') is-invalid @enderror"
                        name="nome"
                        placeholder="Nome"
                        value="{{old('nome')}}"
                    />
                    <label for="nome">Nome</label>

                    @if($errors->has('nome'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control @error('turma') is-invalid @enderror"
                        name="turma"
                        placeholder="Turma"
                        value="{{old('turma')}}"
                    />
                    <label for="turma">Turma</label>

                    @if($errors->has('turma'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('turma') }}
                        </div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <select
                        class="form-control @error('curso') is-invalid @enderror"
                        name="curso"
                    >
                        @foreach($cursos as $curso)
                            <option value="{{$curso->id}}" {{old('curso') == $curso->id ? 'selected' : ''}}>
                                {{$curso->nome}}
                            </option>
                        @endforeach
                    </select>
                    <label for="curso">Curso</label>

                    @if($errors->has('curso'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('curso') }}
                        </div>
                    @endif
                </div>
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
                <button type="submit" class="btn btn-success btn-block align-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12 .736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L2.217 9.384a.733.733 0 1 1 1.047-1.04l2.4 2.401 5.385-6.425a.253.253 0 0 1 .02-.022z"/>
                    </svg>
                    &nbsp; Salvar
                </button>
            </div>
        </div>
    </form>
@endsection