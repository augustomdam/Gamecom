@extends('adminlte::page')

@section('title', 'Gamificacões')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Gamificações</h2>
        <div class="pull-right">
            @can('create', App\Gamificacao::class)
            <a class="btn btn-info" href="{{ route('gamificacaos.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Gamificação
            </a>
            @endcan
        </div>

    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
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
            @foreach ($gamificacaos as $gamifica)
            @can('view', $gamifica)
            <tr>
                <td>{{ $gamifica->id }}</td>
                <td>{{ $gamifica->banner }}</td>
                <td>{{ $gamifica->desc_fases_pontos }}</td>
                <td>{{ $gamifica->desc_desafios_estrategias }}</td>
                <td>{{ $gamifica->desc_medalhas }}</td>
                <td>{{ $gamifica->desc_ranking_premiacao }}</td>
                <td>{{ $gamifica->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('gamificacaos.destroy',$gamifica->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('gamificacaos.show',$gamifica->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-primary" href="{{ route('gamificacaos.edit',$gamifica->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger "
                            onclick="return confirm('Deseja mesmo Excluir a Gamificacao?');">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>
            @endcan
            @endforeach
        </table>
        {{ $gamificacaos->links() }}
    </div>
</div>
@endsection
