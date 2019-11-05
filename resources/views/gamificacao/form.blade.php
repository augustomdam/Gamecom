@extends('adminlte::page')

@section('title', 'Gamificacaos')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Gamificação</h2>
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
            <strong>Atenção!</strong> Problemas ao Salvar a Gamificação.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gamificacaos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Banner:</strong>
                    <input type="file" name="banner" class="form-control-file">
                </div>
                <div class="form-group">
                    <strong>Descrição de Fases e Pontos:</strong>
                    <textarea type="text" name="desc_fases_pontos" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição de Desafios e Estratégias:</strong>
                    <textarea type="text" name="desc_desafios_estrategias" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição de Medalhas:</strong>
                    <textarea type="text" name="desc_medalhas" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <strong>Descrição do Ranking e Premiação:</strong>
                    <textarea type="text" name="desc_ranking_premiacao" class="form-control"></textarea>
                </div>
                <div class="input-group mb-3">
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
