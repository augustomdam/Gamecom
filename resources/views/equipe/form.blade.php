@extends('adminlte::page')

@section('title', 'Equipes')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Equipe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('equipes.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Salvar a Equipe.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <strong>Logo:</strong>
                    <input type="file" name="logo" class="form-control-file">
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Disciplina</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="disciplina_id">
                        <option selected>Selecione...</option>
                        @foreach ($disciplinas as $disciplina)
                            <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
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
