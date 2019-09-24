@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Matricula</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('medalhas.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Atualizar Matricula.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('matriculas.update', $matricula->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="disciplinaSelect">Disciplina</label>
                        <select class="custom-select" id="disciplinaSelect" name="disciplina_id">
                                <option selected value="{{$matricula->disciplina_id}}">{{$matricula->disciplina->nome}}</option>
                                @foreach ($disciplinas as $disciplina)
                                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="alunoSelect">Aluno</label>
                        <select class="custom-select" id="alunoSelect" name="user_id">
                            <option selected value="{{$matricula->user_id}}">{{$matricula->user->name}}</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="equipeSelect">Equipe</label>
                        <select class="custom-select" id="equipeSelect" name="equipe_id">
                            <option selected value="{{$matricula->equipe_id}}">{{$matricula->equipe->nome}}</option>
                            @foreach ($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-sync"></i> Atualizar
                </button>
            </div>
        </div>
    </form>
@endsection
