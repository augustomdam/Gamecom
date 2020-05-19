@extends('adminlte::page')

@section('title', 'Fases')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-laptop-code "></i> Editar Fase</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('fases.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar Fase.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('fases.update', $fase->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectOrdem">Ordem</label>
                                    </div>
                                    <select class="custom-select" id="selectOrdem" name="ordem">
                                        <option selected>{{$fase->ordem}}</option>
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
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectNivel">Nível</label>
                                    </div>
                                    <select class="custom-select" id="selectNivel" name="nivel">
                                        <option selected>{{$fase->nivel}}</option>
                                        <option value="Easy">Easy</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Hard">Hard</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <strong>Banner:</strong>
                                    <input type="file" name="banner" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="nomefase" class="form-control" value="{{$fase->nomefase}}">
                                </div>
                                <div class="form-group">
                                    <strong>Objetivo:</strong>
                                    <textarea type="text" rows="5" name="objetivo"
                                        class="form-control">{{$fase->objetivo}}</textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Pontuação:</strong>
                                    <input type="decimal" name="pontuacao" class="form-control" placeholder="0.00"
                                        min="0" step="0.01" value="{{$fase->pontuacao}}">
                                </div>
                                <div class="form-group">
                                    <strong>Avaliação:</strong>
                                    <textarea type="text" rows="5" name="avaliacao"
                                        class="form-control">{{$fase->avaliacao}}</textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Documento:</strong>
                                    <input type="file" name="documento" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <strong>Prazo:</strong>
                                    <input type="date" name="prazo" class="form-control col-3" value="{{$fase->prazo}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectMedalha">Medalha</label>
                                    </div>
                                    <select class="custom-select" id="selectMedalha" name="medalha_id">
                                        <option selected value="{{$fase->medalha->id}}">{{$fase->medalha->nome}}
                                        </option>
                                        @foreach ($medalhas as $medalha)
                                        <option value="{{$medalha->id}}">{{$medalha->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectDisciplina">Disciplina</label>
                                    </div>
                                    <select class="custom-select" id="selectDisciplina" name="disciplina_id">
                                        <option selected value="{{$fase->disciplina->id}}">{{$fase->disciplina->nome}}
                                        </option>
                                        @foreach ($disciplinas as $disciplina)
                                        @can('view', $disciplina)
                                        <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                        @endcan
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-sync"></i> Atualizar
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
