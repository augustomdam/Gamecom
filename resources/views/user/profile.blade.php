@extends('adminlte::page')

@section('title', 'Perfil')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<div class="card mb-3">
    <img class="card-img-top img-bordered" src="{{ asset('storage/'. $user->imagem) }}"
     alt="{{$user->imagem}}" style="width: 10%;">
    <div class="card-body">
        <h4 class="card-title"><i class="fa fa-user-circle"></i> {{$user->name}}</h4>
        <p class="card-text"> <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</p>
    </div>
    <div class="card-footer text">
        <p class="card-text"> Ultima Atualização: {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}</p>

        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i> Editar Perfil</a>
    </div>
</div>
@endsection
