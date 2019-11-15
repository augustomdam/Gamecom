@extends('adminlte::page')

@section('title', 'Medalhas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h2><i class="fas fa-medal "></i> Editar Medalha</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('medalhas.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar Medalha.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">

                    <form action="{{ route('medalhas.update', $medalha->id) }}" method="POST"
                            enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome"
                                    value="{{$medalha->nome}}">
                                </div>
                                <div class="form-group">
                                    <strong>Imagem:</strong>
                                    <input type="file" name="imagem" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <strong>Descrição:</strong>
                                    <textarea type="text" rows="5" name="descricao"
                                    class="form-control">{{$medalha->descricao}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Disciplina</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="disciplina_id">
                                        @foreach ($disciplinas as $disciplina)
                                            @can('view', $disciplina)
                                                <option selected="selected" value="{{$disciplina->id}}">{{$disciplina->nome}}
                                                </option>
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
