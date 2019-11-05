@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Usuários</h2>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Imagem do Perfil</th>
                <th>Função</th>
                <th>Vincular Função</th>
            </tr>
            @foreach ($users as $user)
            @php
            $funcaos = $user->funcaos
            @endphp
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <img src="{{ asset('storage/'. $user->imagem) }}" alt="{{$user->imagem}}" width="70px" height="50px"
                        class="img-circle">
                </td>
                <td>
                    @foreach ($funcaos as $funcao )
                    <form class="form-group" action="{{ route('user.deleteFuncao', [$user->id, $funcao->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Deseja mesmo Desvincular a Função?');">
                        <i class="fas fa-trash"></i> {{$funcao->nome}}
                    </button>
                    </form>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-outline-info btn-lg" href="{{route('user.atribuir', $user->id)}}">
                        <i class="ion ion-android-add-circle">
                        </i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection
