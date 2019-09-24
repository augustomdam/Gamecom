@extends('adminlte::page')

@section('title', 'Pontuações')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Pontuação</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pontuacaos.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
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
    <form action="{{ route('pontuacaos.update', $pontuacao->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nota:</strong>
                    <input type="number" step="0.01" name="ponto_obtido"
                class="form-control" placeholder="Nota" value="{{$pontuacao->ponto_obtido}}">
                </div>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="faseSelect">Fase</label>
                    <select class="custom-select" id="faseSelect" name="fase_id">
                        <option selected value="{{$pontuacao->fase_id}}">{{$pontuacao->fase->nomefase}}</option>
                        @foreach ($fases as $fase)
                            <option value="{{$fase->id}}">{{$fase->nomefase}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="alunoSelect">Aluno</label>
                    <select class="custom-select" id="alunoSelect" name="user_id">
                    <option selected value="{{$pontuacao->user_id}}">{{$pontuacao->user->name}}</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->name}}</option>
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
