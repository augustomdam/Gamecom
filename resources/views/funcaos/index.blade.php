@extends('adminlte::page')

@section('title', 'Funções')


@section('content')

<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Funções</h2>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('funcaos.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Função
            </a>
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
                <th>Permissões</th>
                <th>Ações</th>
                <th>Vincular Permissão</th>
            </tr>
            @foreach ($funcaos as $funcao)
            @php
            $permissaos = $funcao->permissaos;
            @endphp
            <tr>
                <td>{{ $funcao->id }}</td>
                <td>{{ $funcao->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($funcao->created_at)->format('d/m/Y') }}</td>
                <td class="text-center">

                    @foreach ($permissaos as $permissao )
                    <form class="form-group"
                        action="{{ route('funcao.deletePermissao', [$funcao->id, $permissao->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Deseja mesmo Desvincular a Permissão?');">
                            <i class="fas fa-trash"></i> {{ $permissao->nome }}
                        </button>
                    </form>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('funcaos.destroy',$funcao->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('funcaos.show',$funcao->id) }}">
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
                <td>
                    <a href="{{route ('permissao.atribuir', $funcao)}}" class="btn btn-secondary">
                        <i class="fas fa-user-plus"></i></a>
                </td>
            </tr>

            @endforeach
        </table>
        {{ $funcaos->links() }}
    </div>
</div>
@endsection
