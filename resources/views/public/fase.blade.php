@extends('layouts.app')

@section('title', 'Fase - '. $faseShow->nomefase)

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
                        <img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $fase->banner) }}"
                            class="card-img mt-3">
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
            <div class="card text-center mb-3">
                <div class="card-header">
                    <h3 class="card-title"><span>Fase e Pontuação</span></h3>
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="fase-tab" data-toggle="tab" href="#fase" role="tab"
                                aria-controls="fase" aria-selected="true">{{$faseShow->nomefase}}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="fase" role="tabpanel" aria-labelledby="fase-tab">
                        <p class="card-text text-justify"><b>Nivel: </b>{{$faseShow->nivel}}</p>
                        <p class="card-text text-justify"><b>Missão: </b>{{$faseShow->objetivo}}</p>
                        <p class="card-text text-justify"><b>Avaliação: </b>{{$faseShow->avaliacao}}</p>
                        <p class="card-text text-justify"><b>Pontuação: </b>{{$faseShow->pontuacao}}</p>
                        @if ($faseShow->prazo >= date('Y-m-d'))
                        <p class="card-text text-justify text-success"><b>Prazo: </b>
                            {{ \Carbon\Carbon::parse($faseShow->prazo)->format('d/m/Y') }} </p>
                        @else
                            <p class="card-text text-justify text-danger"><b>Prazo: </b>
                                <s>{{ \Carbon\Carbon::parse($faseShow->prazo)->format('d/m/Y') }}</s></p>
                        @endif
                        <p class="card-text text-justify"><b>Material:</b>
                            <a href="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/".$faseShow->documento)}}">
                                <i class="fa fa-download"></i> {{$faseShow->nomefase}}
                            </a>
                        </p>
                        <p class="card-text text-justify"><b>Recompensa:</b> <img
                                src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $faseShow->medalha->imagem)}}"
                                width="8%"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
