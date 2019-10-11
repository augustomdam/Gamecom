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
                        <img src="{{ asset('storage/'. $fase->banner) }}" class="card-img mt-3">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card text-center">
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
                        <p class="card-text text-justify"><b>Nivel: </b>{{$faseShow->tipo}}</p>
                        <p class="card-text text-justify"><b>Missão: </b>{{$faseShow->objetivo}}</p>
                        <p class="card-text text-justify"><b>Avaliação: </b>{{$faseShow->avaliacao}}</p>
                        <p class="card-text text-justify"><b>Pontuação: </b>{{$faseShow->pontuacao}}</p>
                        <p class="card-text text-justify"><b>Prazo: </b>
                            {{\Carbon\Carbon::parse($faseShow->prazo)->format('d/m/Y') }}</p>
                        <p class="card-text text-justify"><b>Material:</b>
                            <a href="{{asset('storage/'.$faseShow->documento)}}">
                                <i class="fa fa-download"></i> {{$faseShow->documento}}
                            </a>
                        </p>
                        <p class="card-text text-justify"><b>Recompensa:</b> <img
                                src="{{asset('storage/'.$faseShow->medalha->imagem)}}" width="8%"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
