@extends('adminlte::page')

@section('title', 'Pontuações')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Pontuaçao</h2>
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
            <strong>Atenção!</strong> Problemas ao Salvar a Pontuação.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pontuacaos.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nota:</strong>
                    <input type="number" step="0.01" name="ponto_obtido" class="form-control" placeholder="Nota">
                </div>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="faseSelect">Fase</label>
                    <select class="custom-select" id="faseSelect" name="fase_id">
                            <option selected>Selecione...</option>
                            @foreach ($fases as $fase)
                                <option value="{{$fase->id}}">{{$fase->nomefase}}</option>
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
                <button type="submit" class="btn btn-success pull-left">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </form>
@endsection
