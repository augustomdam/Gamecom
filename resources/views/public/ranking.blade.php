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
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="text-center"><i class="fas fa-chart-area"></i> Rankings</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-center">
                        Equipes <i class="fas fa-users"></i>
                    </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Colocação</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Pontuação</th>
                                <th class="text-center">Medalhas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($ranking_equipe as $re)
                                    @if ($i == 1)
                                        <tr class="bg-success">
                                            <td class="text-center">{{$i}}º</td>
                                            <td class="text-center"><img class="img-circle"
                                                    src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $re->equipe->logo) }}"
                                                    alt="{{$re->equipe->logo}}" height="50%">
                                            </td>
                                            <td class="text-center">{{$re->ponto_total}}</td>
                                            @php
                                            $medalhas = app(App\Http\Controllers\publica\PontuacaoController::class)
                                            ->getMedalhas($re->user->id);
                                            @endphp
                                            <td>
                                                @foreach ($medalhas as $m)
                                                <img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $m->fase->medalha->imagem) }}"
                                                    alt="{{$m->fase->medalha->nome}}" width="12%">
                                                @endforeach
                                            </td>
                                        </tr>
                                    @else
                                <tr>
                                    <td class="text-center">{{$i}}º</td>
                                    <td class="text-center"><img class="img-circle"
                                            src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $re->equipe->logo) }}"
                                            alt="{{$re->equipe->logo}}" height="40%">
                                    </td>
                                    <td class="text-center">{{$re->ponto_total}}</td>
                                    @php
                                    $medalhas = app(App\Http\Controllers\publica\PontuacaoController::class)
                                    ->getMedalhas($re->user->id);
                                    @endphp
                                    <td>
                                        @foreach ($medalhas as $m)
                                        <img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $m->fase->medalha->imagem) }}"
                                            alt="{{$m->fase->medalha->nome}}" width="12%">
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @php
                                    $i++;
                                @endphp
                            {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h4 class="text-center">
                        Alunos <i class="fas fa-user-graduate"></i>
                    </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Colocação</th>
                                <th class="text-center" colspan="2">Aluno</th>
                                <th class="text-center">Pontuação</th>
                                <th class="text-center">Medalhas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($ranking_alunos as $ranking_aluno )
                            @if ($i == 1)
                            <tr class="bg-success">
                                <td class="text-center">{{$i}}º</td>
                                <td class="text-center">{{$ranking_aluno->user->name}}</td>
                                <td class="text-center"><img class="img-circle"
                                        src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $ranking_aluno->user->imagem) }}"
                                        alt="{{$ranking_aluno->user->imagem}}" height="20%">
                                </td>
                                <td class="text-center">{{$ranking_aluno->ponto_total}}</td>
                                @php
                                $medalhas = app(App\Http\Controllers\publica\PontuacaoController::class)
                                ->getMedalhas($ranking_aluno->user->id);
                                @endphp
                                <td>
                                    @foreach ($medalhas as $m)
                                        <img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $m->fase->medalha->imagem) }}"
                                        alt="{{$m->fase->medalha->nome}}" width="15%">
                                    @endforeach
                                </td>
                            </tr>
                            @else
                                <tr>
                                    <td class="text-center">{{$i}}º</td>
                                    <td class="text-center">{{$ranking_aluno->user->name}}</td>
                                    <td class="text-center"><img class="img-circle"
                                            src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $ranking_aluno->user->imagem) }}"
                                            alt="{{$ranking_aluno->user->imagem}}" height="15%">
                                    </td>
                                    <td class="text-center">{{$ranking_aluno->ponto_total}}</td>
                                    @php
                                        $medalhas = app(App\Http\Controllers\publica\PontuacaoController::class)
                                        ->getMedalhas($ranking_aluno->user->id);
                                    @endphp
                                    <td>
                                        @foreach ($medalhas as $m)
                                            <img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $m->fase->medalha->imagem) }}"
                                            alt="{{$m->fase->medalha->nome}}" width="12%">
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
