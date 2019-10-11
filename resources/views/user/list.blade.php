@extends('adminlte::page')

@section('title', 'Pontuação')

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
            </tr>
            @foreach ($users as $user)
            @php
                $funcaos = $user->funcaos
            @endphp
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <img src="{{ asset('storage/'. $user->imagem) }}"
                    alt="{{$user->imagem}}" width="70px" height="50px" class="img-circle">
                </td>
                <td>
                    @foreach ($funcaos as $funcao )
                        {{$funcao->nome.'-'}}
                    @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
