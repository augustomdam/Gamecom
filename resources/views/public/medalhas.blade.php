@extends('layouts.app')

@section('title', 'Gamecon - '. $disciplina->nome)

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <a href="{{route('disciplina.fases', $disciplina)}}">
                    <div class="card-header">Fases</div>
                </a>
                <div class="card-body">
                    @foreach ($fases as $fase)
                    <a href="{{route ('fase.show', [$disciplina->id, $fase->id])}}">
                        <img src="{{ asset('storage/'. $fase->banner) }}" class="card-img mt-3">
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <a href="">
                    <div class="card-header">Gamificação</div>
                </a>
                <div class="card-body">
                    <a href="">
                        <img src="{{ asset('images/gamificacao.jpg') }}" class="card-img">
                    </a>
                    <a href="">
                        <img src="{{ asset('images/menu-ranking.png') }}" class="card-img mt-1">
                    </a>
                    <a href="{{route('disciplina.medalhas', $disciplina->id)}}">
                        <img src="{{ asset('images/menu-medalhas.png') }}" class="card-img mt-3">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card text-center">
                <div class="card-header">
                    <h3 class="card-title">Medalhas</h3>
                </div>
                <div class="card-body">
                    @foreach ($fases as $fase)
                    <p class="card-text text-justify">
                        <img src="{{asset('storage/'.$fase->medalha->imagem)}}" width="20%">
                        <b>{{$fase->medalha->descricao}}</b>
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
