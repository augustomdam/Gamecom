@extends('adminlte::page')

@section('title', 'Pontuação')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Pontuações</h2>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('pontuacaos.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Pontuação
                </a>
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
                <th>Data do Lançamento</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($pontuacaos as $ponto)
            <tr>
                <td>{{ $ponto->id }}</td>
                <td>{{ $ponto->ponto_obtido }}</td>
                <td>{{ $ponto->fase->nomefase }}</td>
                <td>{{ $ponto->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($ponto->created_at)->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('pontuacaos.destroy',$ponto->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('pontuacaos.show',$ponto->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-primary" href="{{ route('pontuacaos.edit',$ponto->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Pontuação?');">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
