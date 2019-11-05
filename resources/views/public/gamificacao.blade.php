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
                <a href="{{route('disciplina.gamificacao', $disciplina->id)}}">
                    <div class="card-header">Gamificação</div>
                </a>
                <div class="card-body">
                    <a href="{{route('disciplina.gamificacao', $disciplina->id)}}">
                        <img src="{{ asset('images/gamificacao.jpg') }}" class="card-img">
                    </a>
                    <a href="{{route('disciplina.ranking', $disciplina->id)}}">
                        <img src="{{ asset('images/menu-ranking.png') }}" class="card-img mt-1">
                    </a>
                    <a href="{{route('disciplina.medalhas', $disciplina->id)}}">
                        <img src="{{ asset('images/menu-medalhas.png') }}" class="card-img mt-3">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <img src="{{ asset('storage/'. $gamificacao->banner) }}" class="card-img-top">
                <div class="card-body">
                    <h3>Fases e Pontuações</h3>
                    <p class="card-text text-justify">{{$gamificacao->desc_fases_pontos}}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Pontuação</th>
                                <th>Objetivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fases as $fase)
                            <tr>
                                <td><b>Fase</b> {{$fase->ordem}}</td>
                                <td>{{$fase->pontuacao}}</td>
                                <td class="card-text text-justify">{{$fase->objetivo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>Desafios e Estratégias</h3>
                    <p class="card-text text-justify">{{$gamificacao->desc_desafios_estrategias}}</p>
                    <h3>Medalhas</h3>
                    <p class="card-text text-justify">{{$gamificacao->desc_medalhas}}</p>
                    <h3>Ranking e Premição</h3>
                    <p class="card-text text-justify">{{$gamificacao->desc_ranking_premiacao}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
