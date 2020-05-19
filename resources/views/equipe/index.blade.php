@extends('adminlte::page')

@section('title', 'Equipes')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-users "></i> Lista de Equipes</h2>
        <div class="pull-right">
            @can('create', App\Equipe::class)
            <a class="btn btn-info" href="{{ route('equipes.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Equipe
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
                <th>Logo</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($equipes as $equipe)
            @can('view', $equipe)
            <tr>
                <td>{{ $equipe->id }}</td>
                <td>{{ $equipe->nome }}</td>
                <td><img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $equipe->logo) }}"
                    alt="{{$equipe->logo}}" width="100px" height="50px"></td>
                <td>{{ $equipe->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('equipes.destroy',$equipe->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('equipes.show',$equipe->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('update', $equipe)
                            <a class="btn btn-primary" href="{{ route('equipes.edit',$equipe->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $equipe)
                            <button type="submit" class="btn btn-danger "
                                onclick="return confirm('Deseja mesmo Excluir a Equipe?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endcan
            @endforeach
        </table>
        {{ $equipes->links() }}
    </div>
</div>
@endsection
