@extends('adminlte::page')

@section('title', 'Equipe')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-users "></i> Detalhando a Equipe</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Logo</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            <tr>
                <td>{{ $equipe->id }}</td>
                <td>{{ $equipe->nome }}</td>
                <td><img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $equipe->logo) }}"
                    alt="{{$equipe->logo}}" width="100px" height="50px"></td>
                <td>{{ $equipe->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('equipes.destroy',$equipe->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('equipes.index') }}">
                            <i class="fas fa-undo"></i>
                        </a>
                        @can('update', $equipe)
                            <a class="btn btn-primary" href="{{ route('equipes.edit',$equipe->id) }}" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $equipe)
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a equipe?');">
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
