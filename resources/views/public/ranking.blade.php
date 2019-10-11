@extends('layouts.app')

@section('title', 'Gamecon - '. $disciplina->nome)

@section('content')

{{-- {{dd($equipe)}} --}}

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
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Ranking de Pontuações</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Pontuação</th>
                                <th>Fase</th>
                                <th>Equipe</th>
                                <th>Medalhas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pontuacaos as $pontuacao)
                            @foreach ($pontuacao as $ponto)
                            <tr>
                                <td>{{$ponto->user->name}}</td>
                                <td>{{$ponto->ponto_obtido}}</td>
                                <td>{{$ponto->fase->nomefase}}</td>
                                <td>{{$equipe[$ponto->user->id]->nome}}</td>
                            <td>
                                <img src="{{asset('storage/'.$ponto->fase->medalha->imagem) }}"  alt="{{$ponto->fase->medalha->nome}}" width="10%">
                            </td>
                            </tr>
                            @endforeach
                            <td class="text-center"><b>Pontuação Geral: </b>{{$notas[$ponto->user->id]}}</td>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
