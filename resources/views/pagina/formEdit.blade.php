@extends('adminlte::page')

@section('title', 'Paginas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Editar Pagina</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('paginas.index') }}">
                    <i class="fas fa-undo-alt"></i> Voltar
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Atualizar Disciplinas.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paginas.update', $pagina->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titulo:</strong>
                <input type="text" name="titulo" value="{{$pagina->titulo}}"class="form-control" placeholder="titulo">
                </div>
                <div class="form-group">
                    <strong>Banner:</strong>
                    <input type="file" name="banner" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Corpo:</strong>
                    <textarea name="corpo" class="form-control" placeholder="corpo">{{$pagina->corpo}}</textarea>
                </div>
                <div class="form-group">
                    <strong>Tipo:</strong>
                    <input type="text" name="tipo" value="{{$pagina->tipo}}" class="form-control" placeholder="tipo">
                </div>
                <div class="form-group" hidden>
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Disciplina</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="disciplina_id">
                            <option value="{{$pagina->disciplina_id}}"></option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </form>
@endsection
