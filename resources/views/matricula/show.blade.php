@extends('adminlte::page')

@section('title', 'Matricula')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-business-time "></i> Detalhando a Matricula</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Disciplina</th>
                    <th>Equipe</th>
                    <th>Data da Matricula</th>
                    <th colspan="3">Ações</th>
                </tr>
                <tr>
                    <td>{{ $matricula->id }}</td>
                    <td>{{ $matricula->user->name }}</td>
                    <td>{{ $matricula->disciplina->nome }}</td>
                    <td>{{ $matricula->equipe->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($matricula->created_at)->format('d/m/Y') }}</td>
                    <td>
                    <form action="{{ route('matriculas.destroy',$matricula->id) }}" method="POST">

                        <a class="btn btn-warning" href="{{ route('matriculas.index') }}">
                            <i class="fas fa-undo"></i>
                        </a>
                        @can('update', $matricula)
                        <a class="btn btn-primary" href="{{ route('matriculas.edit',$matricula->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $matricula)
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Matricula?');">
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
