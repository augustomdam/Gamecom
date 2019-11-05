@extends('layouts.app')

@section('title', 'Fase - '. $disciplina->nome)

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
            <div class="card text-center">
                <div class="card-header">
                    <h3 class="card-title"><span>Fases e Pontuação</span></h3>
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                                aria-controls="all" aria-selected="true">Todas</a>
                        </li>
                        @foreach ($fases as $fase)
                        <li class="nav-item">
                            <a class="nav-link" id="{{str_replace(' ', '', $fase->nomefase)}}-tab" data-toggle="tab"
                                href="#{{str_replace(' ', '', $fase->nomefase)}}" role="tab"
                                aria-controls="{{str_replace(' ', '', $fase->nomefase)}}"
                                aria-selected="true">{{$fase->nomefase}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Etapa</th>
                                    <th>Pontuação</th>
                                    <th>Objetivo</th>
                                    <th>Avaliação</th>
                                    <th>Pontuação</th>
                                    <th>Prazo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fases as $fase)
                                <tr>
                                    <td>Fase {{$fase->ordem}}</td>
                                    <td>{{$fase->pontuacao}}</td>
                                    <td class="card-text text-justify">{{$fase->objetivo}}</td>
                                    <td class="card-text text-justify">{{$fase->avaliacao}}</td>
                                    <td class="card-text">{{$fase->pontuacao}}</td>
                                    <td class="card-text">{{\Carbon\Carbon::parse($fase->prazo)->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    @foreach ($fases as $fase)
                    <div class="tab-pane fade show p-3" id="{{str_replace(' ', '', $fase->nomefase)}}" role="tabpanel"
                        aria-labelledby="{{str_replace(' ', '', $fase->nomefase)}}-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Etapa</th>
                                    <th>Pontuação</th>
                                    <th>Objetivo</th>
                                    <th>Avaliação</th>
                                    <th>Pontuação</th>
                                    <th>Prazo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fase {{$fase->ordem}}</td>
                                    <td>{{$fase->pontuacao}}</td>
                                    <td class="card-text text-justify">{{$fase->objetivo}}</td>
                                    <td class="card-text text-justify">{{$fase->avaliacao}}</td>
                                    <td class="card-text">{{$fase->pontuacao}}</td>
                                    <td class="card-text">{{\Carbon\Carbon::parse($fase->prazo)->format('d/m/Y')}}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
