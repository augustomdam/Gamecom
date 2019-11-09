@extends('adminlte::page')

@section('title', 'Funções')


@section('content')

<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Funções</h2>
        <div class="pull-right">
            @can('create', App\Funcao::class)
            <a class="btn btn-info" href="{{ route('funcaos.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Função
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
                <th>ID</th>
                <th>Nome</th>
                <th>Data da Criação</th>
                <th>Ações</th>
            </tr>
            @foreach ($funcaos as $funcao)
                @can('view', $funcao)
                    <tr>
                        <td>{{ $funcao->id }}</td>
                        <td>{{ $funcao->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($funcao->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('funcaos.destroy',$funcao->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('funcaos.show',$funcao->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-primary" href="{{ route('funcaos.edit',$funcao->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "
                                    onclick="return confirm('Deseja mesmo Excluir a Função?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
        {{ $funcaos->links() }}
    </div>
</div>
@endsection
