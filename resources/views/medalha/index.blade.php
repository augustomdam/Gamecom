@extends('adminlte::page')

@section('title', 'Medalhas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Medalhas</h2>
        <div class="pull-right">
            @can('create', App\Medalha::class)
                <a class="btn btn-info" href="{{ route('medalhas.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Medalha
                </a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($medalhas as $medalha)
            @can('view', $medalha)
            <tr>
                <td>{{ $medalha->id }}</td>
                <td>{{ $medalha->nome }}</td>
                <td>{{ $medalha->imagem }}</td>
                <td>{{ $medalha->descricao }}</td>
                <td>{{ $medalha->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('medalhas.destroy',$medalha->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('medalhas.show',$medalha->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-primary" href="{{ route('medalhas.edit',$medalha->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger "
                            onclick="return confirm('Deseja mesmo Excluir a Medalha?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endcan
            @endforeach
        </table>
        {{ $medalhas->links() }}
    </div>
</div>
@endsection
