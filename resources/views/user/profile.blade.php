@extends('adminlte::page')

@section('title', 'Perfil')

@section('content')

<div class="card" style="width:100%" >
    <img class="card-img-top" src="{{ asset('storage/'. $user->imagem) }}"
     alt="{{$user->imagem}}" >
    <div class="card-body">

        <h4 class="card-title">{{$user->name}}</h4>
        <p class="card-text">{{$user->email}}</p>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>

        <button type="button" class="btn btn-outline-primary">Primary</button>
        <button type="button" class="btn btn-outline-secondary">Secondary</button>
        <button type="button" class="btn btn-outline-success">Success</button>
        <button type="button" class="btn btn-outline-danger">Danger</button>
        <button type="button" class="btn btn-outline-warning">Warning</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        <button type="button" class="btn btn-outline-light">Light</button>
        <button type="button" class="btn btn-outline-dark">Dark</button>
    </div>
</div>
@endsection
