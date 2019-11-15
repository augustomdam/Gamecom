@extends('adminlte::page')

@section('title', 'Fases')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-laptop-code "></i> Inserir Fase</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('fases.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
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
                </div>
                <div class="card-body">
                    <form action="{{ route('fases.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
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
                                        <option value="6">Sexta</option>
                                        <option value="7">Sétima</option>
                                        <option value="8">Oitava</option>
                                        <option value="9">Nona</option>
                                        <option value="10">Décima</option>
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
                                    <textarea type="text" rows="5" name="objetivo" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Pontuação:</strong>
                                    <input type="decimal" name="pontuacao" class="form-control" placeholder="0.00"
                                        min="0" step="0.01">
                                </div>
                                <div class="form-group">
                                    <strong>Avaliação:</strong>
                                    <textarea type="text" rows="5" name="avaliacao" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Documento:</strong>
                                    <input type="file" name="documento" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <strong>Prazo:</strong>
                                    <input type="date" name="prazo" class="form-control col-3">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectMedalha">Medalha</label>
                                    </div>
                                    <select class="custom-select" id="selectMedalha" name="medalha_id">
                                        <option selected>Selecione...</option>
                                        @foreach ($medalhas as $medalha)
                                            @can('view', $medalha)
                                                <option value="{{$medalha->id}}">{{$medalha->nome}}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectDisciplina">Disciplina</label>
                                    </div>
                                    <select class="custom-select" id="selectDisciplina" name="disciplina_id">
                                        <option selected>Selecione...</option>
                                        @foreach ($disciplinas as $disciplina)
                                            @can('view', $disciplina)
                                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                            @endcan
                                        @endforeach
                                    </select>
                                </div>
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
