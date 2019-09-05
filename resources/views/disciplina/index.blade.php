@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Disciplinas</h2>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('disciplinas.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Disciplina
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
                <th>Curso</th>
                <th>Semestre</th>
                <th>Professor</th>
                <th width="280px">Ações</th>
            </tr>
            @foreach ($disciplinas as $disciplina)
            <tr>
                <td>{{ $disciplina->id }}</td>
                <td>{{ $disciplina->nome }}</td>
                <td>{{ $disciplina->curso }}</td>
                <td>{{ $disciplina->semestre }}</td>
                <td>{{ $disciplina->user->name }}</td>
                <td>
                    <form action="{{ route('disciplinas.destroy',$disciplina->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('disciplinas.show',$disciplina->id) }}">
                            <i class="fas fa-eye"></i>  Mostrar
                        </a>
                        <a class="btn btn-primary" href="{{ route('disciplinas.edit',$disciplina->id) }}">
                            <i class="fas fa-pencil-alt"></i>  Editar
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo Excluir a Disciplina?');">
                            <i class="fas fa-trash"></i>  Apagar
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
{{-- {!! $disciplinas->links() !!} --}}
@endsection
