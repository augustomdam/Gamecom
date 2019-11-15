@extends('adminlte::page')

@section('title', 'Pontuações')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-chart-line "></i> Editar Pontuação</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('pontuacaos.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar Pontuação.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('pontuacaos.update', $pontuacao->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nota:</strong>
                                    <input type="number" step="0.01" name="ponto_obtido" class="form-control"
                                        placeholder="Nota" value="{{$pontuacao->ponto_obtido}}">
                                </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="faseSelect">Fase</label>
                                    <select class="custom-select" id="faseSelect" name="fase_id">
                                        <option selected value="{{$pontuacao->fase_id}}">{{$pontuacao->fase->nomefase}}
                                        </option>
                                        @foreach ($fases as $fase)
                                        @can('view', $fase)
                                        <option value="{{$fase->id}}">{{$fase->nomefase}}</option>
                                        @endcan
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="alunoSelect">Aluno</label>
                                    <select class="custom-select" id="alunoSelect" name="user_id">
                                        <option selected value="{{$pontuacao->user_id}}">{{$pontuacao->user->name}}
                                        </option>
                                        @foreach ($alunos as $aluno)
                                        <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="input-group-prepend">
                                        <label class="input-group-text" for="disciplinaSelect">Disciplina</label>
                                        <select class="custom-select" id="disciplinaSelect" name="disciplina_id">
                                            <option selected value="{{$pontuacao->disciplina_id}}">{{$pontuacao->disciplina->nome}}
                                            </option>
                                            @foreach ($disciplinas as $disciplina)
                                            <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-sync"></i> Atualizar
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
