@extends('adminlte::page')

@section('title', 'Gamificacaos')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-gamepad "></i> Editar Gamificação</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('gamificacaos.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar Gamificação.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('gamificacaos.update', $gamificacao->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Banner:</strong>
                                    <input type="file" name="banner" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <strong>Descrição de Fases e Pontos:</strong>
                                    <textarea name="desc_fases_pontos" rows="10"
                                        class="form-control">{{$gamificacao->desc_fases_pontos}}</textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Descrição de Desafios e Estratégias:</strong>
                                    <textarea name="desc_desafios_estrategias" rows="10"
                                        class="form-control">{{$gamificacao->desc_desafios_estrategias}}</textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Descrição de Medalhas:</strong>
                                    <textarea name="desc_medalhas" rows="10"
                                        class="form-control">{{$gamificacao->desc_medalhas}}</textarea>
                                </div>
                                <div class="form-group">
                                    <strong>Descrição do Ranking e Premiação:</strong>
                                    <textarea name="desc_ranking_premiacao" rows="10"
                                        class="form-control">{{$gamificacao->desc_ranking_premiacao}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Disciplina</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="disciplina_id">
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
