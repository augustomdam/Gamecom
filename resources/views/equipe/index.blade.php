@extends('adminlte::page')

@section('title', 'Equipes')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Equipes</h2>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('equipes.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Equipe
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
                <th>Id</th>
                <th>Nome</th>
                <th>Logo</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($equipes as $equipe)
            <tr>
                <td>{{ $equipe->id }}</td>
                <td>{{ $equipe->nome }}</td>
                <td>{{ $equipe->logo }}</td>
                <td>{{ $equipe->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('equipes.destroy',$equipe->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('equipes.show',$equipe->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-primary" href="{{ route('equipes.edit',$equipe->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Equipe?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $equipes->links() }}
    </div>
</div>
@endsection
