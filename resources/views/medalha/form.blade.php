@extends('adminlte::page')

@section('title', 'Medalhas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Incluir Medalha</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('medalhas.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Salvar a Medalha.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medalhas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <strong>Imagem:</strong>
                    <input type="file" name="imagem" class="form-control-file">
                </div>
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <textarea type="text" name="descricao" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success pull-left">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </form>
@endsection
