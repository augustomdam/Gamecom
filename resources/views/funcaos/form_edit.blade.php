@extends('adminlte::page')

@section('title', 'Função')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h2 class="text-center">Incluir Função</h2>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('funcaos.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Salvar a Função.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('funcaos.update', $funcao->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- <div class="col-md-3"></div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Funçao:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Função" value="{{$funcao->nome}}">
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
