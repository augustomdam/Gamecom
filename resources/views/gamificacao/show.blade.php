@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-gamepad "></i> Detalhando Gamificação</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Banner</th>
                <th>Descrição de Fases e Pontos</th>
                <th>Descrição de Desafios e Estratégias</th>
                <th>Descrição de Medalhas</th>
                <th>Descrição do Ranking Premiação</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            <tr>
                <td>{{ $gamificacao->id }}</td>
                <td><img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $gamificacao->banner) }}"
                    alt="{{$gamificacao->banner}}" height="10%"></td>
                <td>{{ $gamificacao->desc_fases_pontos }}</td>
                <td>{{ $gamificacao->desc_desafios_estrategias }}</td>
                <td>{{ $gamificacao->desc_medalhas }}</td>
                <td>{{ $gamificacao->desc_ranking_premiacao }}</td>
                <td>{{ $gamificacao->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('gamificacaos.destroy',$gamificacao->id) }}" method="POST">

                        <a class="btn btn-warning" href="{{ route('gamificacaos.index',$gamificacao->id) }}">
                            <i class="fas fa-undo"></i>
                        </a>
                        <a class="btn btn-primary" href="{{ route('gamificacaos.edit',$gamificacao->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Gamificacao?');">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>

        </table>
    </div>
</div>
@endsection
