@extends('adminlte::page')

@section('title', 'Pontuações')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-chart-line "></i> Detalhando a Pontuação</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Pontos Obtido</th>
                    <th>Fase</th>
                    <th>Aluno</th>
                    <th>Disciplina</th>
                    <th>Data do Lançamento</th>
                    <th colspan="3">Ações</th>
                </tr>
                <tr>
                    <td>{{ $pontuacao->id }}</td>
                    <td>{{ $pontuacao->ponto_obtido }}</td>
                    <td>{{ $pontuacao->fase->nomefase }}</td>
                    <td>{{ $pontuacao->user->name }}</td>
                    <td>{{ $pontuacao->disciplina->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($pontuacao->created_at)->format('d/m/Y') }}</td>
                    <td>
                    <form action="{{ route('pontuacaos.destroy',$pontuacao->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('pontuacaos.index') }}">
                            <i class="fas fa-undo"></i>
                        </a>
                        @can('update', $pontuacao)
                            <a class="btn btn-primary" href="{{ route('pontuacaos.edit',$pontuacao->id) }}" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $pontuacao)
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Pontuação?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
