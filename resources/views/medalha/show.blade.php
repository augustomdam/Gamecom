@extends('adminlte::page')

@section('title', 'Medalha')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-medal "></i> Detalhando Medalha</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Descricao</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            <tr>
                <td>{{ $medalha->id }}</td>
                <td>{{ $medalha->nome }}</td>
                <td><img src="{{ asset('storage/'. $medalha->imagem) }}"
                    alt="{{$medalha->imagem}}" width="100px" height="50px"></td>
                <td>{{ $medalha->descricao }}</td>
                <td>{{ $medalha->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('medalhas.destroy',$medalha->id) }}" method="POST">

                        <a class="btn btn-warning" href="{{ route('medalhas.index',$medalha->id) }}">
                            <i class="fas fa-undo"></i>
                        </a>
                        @can('update', $medalha)
                            <a class="btn btn-primary" href="{{ route('medalhas.edit',$medalha->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $medalha)
                            <button type="submit" class="btn btn-danger "
                                onclick="return confirm('Deseja mesmo Excluir a Medalha?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
