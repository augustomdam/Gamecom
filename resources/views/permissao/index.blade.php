@extends('adminlte::page')

@section('title', 'Permissões')


@section('content')

<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Permissões</h2>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('permissaos.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Permissão
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
                <th>Data da Atualização</th>
                <th>Ações</th>
            </tr>
            @foreach ($permissaos as $permissao)
            <tr>
                <td>{{ $permissao->id }}</td>
                <td>{{ $permissao->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($permissao->created_at)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($permissao->updated_at)->format('d/m/Y') }}</td>
                <td>
                    <form class="form-horizontal" action="{{ route('permissaos.destroy',$permissao->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('permissaos.show',$permissao->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-primary" href="{{ route('permissaos.edit',$permissao->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Permissão?');">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>

            @endforeach
        </table>
        {{ $permissaos->links() }}
    </div>
</div>
@endsection
