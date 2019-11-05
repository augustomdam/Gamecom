@extends('adminlte::page')

@section('title', 'Editar Perfil - '. $user->name)

@section('content')
<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Perfil</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('user.profile') }}">
                        <i class="fas fa-undo-alt"></i> Voltar
                    </a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Problemas ao Atualizar o Perfil.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Foto do Perfil</strong>
                        <input type="file" name="imagem" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-success pull-left">
                        <i class="fas fa-sync"></i> Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
