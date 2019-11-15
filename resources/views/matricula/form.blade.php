@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-business-time "></i> Inserir Matrícula</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('matriculas.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
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
                </div>
                <div class="card-body">
                    <form action="{{ route('matriculas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="disciplinaSelect">Disciplina</label>
                                    <select class="custom-select" id="disciplinaSelect" name="disciplina_id">
                                        <option selected>Selecione...</option>
                                        @foreach ($disciplinas as $disciplina)
                                            @can('view', $disciplina)
                                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="alunoSelect">Aluno</label>
                                    <select class="custom-select" id="alunoSelect" name="user_id">
                                        <option selected>Selecione...</option>
                                        @foreach ($alunos as $aluno)
                                        <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="equipeSelect">Equipe</label>
                                    <select class="custom-select" id="equipeSelect" name="equipe_id">
                                        <option selected>Selecione...</option>
                                        @foreach ($equipes as $equipe)
                                            @can('view', $equipe)
                                                <option value="{{$equipe->id}}">{{$equipe->nome}}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
