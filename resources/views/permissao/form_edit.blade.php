@extends('adminlte::page')

@section('title', 'Permissão')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h2 class="text-center">Editar Permissão</h2>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('permissaos.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar a Permissão.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('permissaos.update', $permissao->id) }}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Permissão:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Permissão..." value="{{$permissao->nome}}">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
