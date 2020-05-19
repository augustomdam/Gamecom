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
                        <img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $fase->banner) }}" class="card-img mt-3">
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="card mb-3">
                <a href="{{route('disciplina.gamificacao', $disciplina->id)}}">
                    <div class="card-header">Gamificação</div>
                </a>
                <div class="card-body">
                    <a href="{{route('disciplina.gamificacao', $disciplina->id)}}">
                        <img src="{{ asset('images/gamificacao.jpg') }}" class="card-img">
                    </a>
                    <a href="{{route('disciplina.medalhas', $disciplina->id)}}">
                        <img src="{{ asset('images/menu-medalhas.png') }}" class="card-img mt-3">
                    </a>
                    <a href="{{route('disciplina.ranking', $disciplina->id)}}">
                        <img src="{{ asset('images/menu-ranking.png') }}" class="card-img mt-1">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Medalhas <i class="fa fa-medal"></i></h3>
                </div>
                <div class="card-body">
                    @foreach ($medalhas as $medalha)
                    <p class="card-text text-justify">
                        <img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $medalha->imagem)}}" width="15%">
                        <b>{{$medalha->descricao}}</b>
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
