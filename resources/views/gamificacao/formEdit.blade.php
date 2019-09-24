@extends('adminlte::page')

@section('title', 'Gamificacaos')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Gamificacao</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('gamificacaos.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
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
    <form action="{{ route('gamificacaos.update', $gamificacao->id) }}" method="POST" enctype="multipart/form-data">
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
                    <textarea name="desc_fases_pontos" class="form-control">{{$gamificacao->desc_fases_pontos}}</textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição de Desafios e Estratégias:</strong>
                    <textarea name="desc_desafios_estrategias" class="form-control">{{$gamificacao->desc_desafios_estrategias}}</textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição de Medalhas:</strong>
                    <textarea name="desc_medalhas" class="form-control">{{$gamificacao->desc_medalhas}}</textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição do Ranking e Premiação:</strong>
                    <textarea name="desc_ranking_premiacao" class="form-control">{{$gamificacao->desc_ranking_premiacao}}</textarea>
                </div>
                <div class="form-group" hidden>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Disciplina</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="disciplina_id">
                        <option value="{{$gamificacao->disciplina_id}}"></option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-sync"></i> Atualizar
                </button>
            </div>
        </div>
    </form>
@endsection
