@extends('adminlte::page')

@section('title', 'Atribuir Função')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    <h2>Atribuir Função</h2>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('user.list') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body">

                    <form action="{{ route('user.atribuiFuncao') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Usuário: {{$user->name}}</strong>
                                </div>
                                <div class="form-group" hidden>
                                    <select class="custom-select" id="inputGroupSelect01" name="user_id">
                                        <option value="{{$user->id}}"></option>
                                    </select>
                                </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="faseSelect">Função</label>
                                    <select class="custom-select" id="faseSelect" name="funcao_id">
                                        <option selected value=" ">Selecione...</option>
                                        @foreach ($funcaos as $funcao)
                                        <option value="{{$funcao->id}}">{{$funcao->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-sync"></i> Salvar
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
