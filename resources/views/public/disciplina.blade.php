@extends('layouts.app')

@section('title', 'Gamecom - '. $disciplina->nome)

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
            <div class="card">
                <img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $pagina->banner) }}" class="card-img-top">
                <div class="card-body">
                    <h3>{{$pagina->titulo}}</h3>
                    <p class="card-text text-justify">{{$pagina->corpo}}</p>
                    {{-- <h5>{{$pagina->tipo}}</h5> --}}
                    @foreach ($fases as $fase)
                    <h5><b>Fase:</b> {{$fase->nomefase}}</h5>
                    <p class="card-text text-justify"><b>Nível:</b> {{$fase->nivel}}</p>
                    <p class="card-text text-justify"><b>Objetivo:</b> {{$fase->objetivo}}</p>
                    <p class="card-text text-justify"><b>Pontuação:</b> {{$fase->pontuacao}}</p>
                    <p class="card-text text-justify"><b>Avaliação:</b> {{$fase->avaliacao}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
