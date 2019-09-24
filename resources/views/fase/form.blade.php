@extends('adminlte::page')

@section('title', 'Fases')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Fase</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('fases.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Salvar a Fase.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fases.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="selectOrdem">Ordem</label>
                        </div>
                        <select class="custom-select" id="selectOrdem" name="ordem">
                            <option selected>Selecione...</option>
                                <option value="1">Primeira</option>
                                <option value="2">Segunda</option>
                                <option value="3">Terceira</option>
                                <option value="4">Quarta</option>
                                <option value="5">Quinta</option>
                        </select>
                </div>
                <div class="form-group">
                        <strong>Tipo:</strong>
                        <input type="text" name="tipo" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Banner:</strong>
                    <input type="file" name="banner" class="form-control-file">
                </div>
                <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="nomefase" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Objetivo:</strong>
                    <textarea type="text" name="objetivo" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <strong>Pontuação:</strong>
                        <input type="decimal" name="pontuacao" class="form-control" placeholder="0.00"
                            min="0" value="0" step="0.01">
                </div>
                <div class="form-group">
                    <strong>Avaliação:</strong>
                    <textarea type="text" name="avaliacao" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <strong>Documento:</strong>
                        <input type="file" name="documento" class="form-control-file">
                </div>
                <div class="form-group">
                        <strong>Prazo:</strong>
                        <input type="date" name="prazo" class="form-control">
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="selectMedalha">Medalha</label>
                    </div>
                    <select class="custom-select" id="selectMedalha" name="medalha_id">
                        <option selected>Selecione...</option>
                        @foreach ($medalhas as $medalha)
                            <option value="{{$medalha->id}}">{{$medalha->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="selectDisciplina">Disciplina</label>
                    </div>
                    <select class="custom-select" id="selectDisciplina" name="disciplina_id">
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
