@extends('adminlte::page')

@section('title', 'Pontuação')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-chart-line "></i> Lista de Pontuações</h2>
        <div class="pull-right">
            @can('create', App\Pontuacao::class)
                <a class="btn btn-info" href="{{ route('pontuacaos.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Pontuação
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
                <th>ID</th>
                <th>Pontos Obtido</th>
                <th>Fase</th>
                <th>Aluno</th>
                <th>Disciplina</th>
                <th>Data do Lançamento</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($pontuacaos as $ponto)
                @can('view', $ponto)
                    <tr>
                        <td>{{ $ponto->id }}</td>
                        <td>{{ $ponto->ponto_obtido }}</td>
                        <td>{{ $ponto->fase->nomefase }}</td>
                        <td>{{ $ponto->user->name }}</td>
                        <td>{{ $ponto->disciplina->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($ponto->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('pontuacaos.destroy',$ponto->id) }}" method="POST">
                                @can('view', $ponto)
                                    <a class="btn btn-warning" href="{{ route('pontuacaos.show',$ponto->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('update', $ponto)
                                    <a class="btn btn-primary" href="{{ route('pontuacaos.edit',$ponto->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                 @csrf
                                @method('DELETE')
                                @can('delete', $ponto)
                                    <button type="submit" class="btn btn-danger "
                                        onclick="return confirm('Deseja mesmo Excluir a Pontuação?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
        {{ $pontuacaos->links() }}
    </div>
</div>
@endsection
