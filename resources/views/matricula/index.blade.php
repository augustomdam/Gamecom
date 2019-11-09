@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Matrículas</h2>
        <div class="pull-right">
            @can('create', App\Matricula::class)
                <a class="btn btn-info" href="{{ route('matriculas.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Matricula
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
                <th>Aluno</th>
                <th>Disciplina</th>
                <th>Equipe</th>
                <th>Data da Matricula</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($matriculas as $matricula)
                @can('view', $matricula)
                    <tr>
                        <td>{{ $matricula->id }}</td>
                        <td>{{ $matricula->user->name }}</td>
                        <td>{{ $matricula->disciplina->nome }}</td>
                        <td>{{ $matricula->equipe->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($matricula->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('matriculas.destroy',$matricula->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('matriculas.show',$matricula->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('update', $matricula)
                                    <a class="btn btn-primary" href="{{ route('matriculas.edit',$matricula->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('delete', $matricula)
                                    <button type="submit" class="btn btn-danger "
                                        onclick="return confirm('Deseja mesmo Excluir a Matricula?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
        {{ $matriculas->links() }}
    </div>
</div>
@endsection
