@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Matricula</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('matriculas.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Salvar a Matricula.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matriculas.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="disciplinaSelect">Disciplina</label>
                    <select class="custom-select" id="disciplinaSelect" name="disciplina_id">
                            <option selected>Selecione...</option>
                            @foreach ($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="input-group-prepend">
                    <label class="input-group-text" for="alunoSelect">Aluno</label>
                    <select class="custom-select" id="alunoSelect" name="user_id">
                            <option selected>Selecione...</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="input-group-prepend">
                    <label class="input-group-text" for="equipeSelect">Equipe</label>
                    <select class="custom-select" id="equipeSelect" name="equipe_id">
                            <option selected>Selecione...</option>
                            @foreach ($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                            @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success pull-left">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </form>
@endsection
