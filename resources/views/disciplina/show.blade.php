@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fa fa-address-book"></i> Detalhando Disciplina</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Instituição</th>
                <th>Semestre</th>
                <th>Professor</th>
                <th width="280px">Ações</th>
            </tr>
            <tr>
                <td>{{ $disciplina->id }}</td>
                <td>{{ $disciplina->nome }}</td>
                <td>{{ $disciplina->curso }}</td>
                <td>{{ $disciplina->instituicao }}</td>
                <td>{{ $disciplina->semestre }}</td>
                <td>{{ $disciplina->user->name }}</td>
                <td>
                    <form action="{{ route('disciplinas.destroy',$disciplina->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('disciplinas.index') }}">
                            <i class="fas fa-undo-alt"></i>
                        </a>
                        @can('update', $disciplina)
                        <a class="btn btn-primary" href="{{ route('disciplinas.edit',$disciplina->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $disciplina)
                        <button type="submit" class="btn btn-danger "
                            onclick="return confirm('Deseja mesmo Excluir a Disciplina?');">
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
