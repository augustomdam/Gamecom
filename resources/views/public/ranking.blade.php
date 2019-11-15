@extends('layouts.app')

@section('title', 'Gamecon - '. $disciplina->nome)

@section('content')

{{-- {{dd($ranking_aluno)}} --}}

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
                <div class="card-header">
                    <h3 class="text-center"><i class="fas fa-chart-area"></i> Rankings</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-center">
                         Ranking das Equipes <i class="fas fa-users"></i>
                    </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                {{-- <th>Nº</th> --}}
                                <th>Nome da Equipe</th>
                                <th>Pontuação Total</th>
                                {{-- <th>Medalhas</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking_equipe as $re )
                            <tr>
                                <td>{{$re->equipe->nome}}</td>
                                <td>{{$re->ponto_total}}</td>
                                {{-- <td>
                                    @foreach ($medalhas as $medalha)
                                        @foreach ($medalha as $m)
                                            <img src="{{asset('storage/'.$m->fase->medalha->imagem) }}"
                                alt="{{$m->nome}}"
                                width="10%">
                                @endforeach
                                @endforeach
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h4 class="text-center">
                        Ranking dos Alunos <i class="fas fa-user-graduate"></i>
                    </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                {{-- <th>Nº</th> --}}
                                <th>Aluno</th>
                                <th>Pontuação</th>
                                {{-- <th>Medalhas</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking_alunos as $ranking_aluno )
                            <tr>
                                <td>{{$ranking_aluno->user->name}}</td>
                                <td>{{$ranking_aluno->ponto_total}}</td>
                                {{-- {{dd($medalha)}} --}}
                            </tr>
                            @endforeach
                            {{-- @foreach ($medalhas as $medalha )
                            <tr>
                                <td>
                                    @foreach ($medalha as $m)
                                    <img src="{{asset('storage/'.$m->fase->medalha->imagem) }}" alt="{{$m->nome}}"
                                    width="10%">
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
