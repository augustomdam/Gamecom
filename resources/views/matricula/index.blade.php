@extends('adminlte::page')

@section('title', 'Matriculas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-business-time "></i> Lista de Matrículas</h2>
        <div class="pull-right">
            @can('create', App\Matricula::class)
            <a class="btn btn-info" href="{{ route('matriculas.create') }}">
                <i class="fas fa-plus-circle"></i> Criar Matricula
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-4 pull-left">
                @can('create', App\Matricula::class)
                <form class="card card-sm" action="{{ route('matricula.buscar') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search"
                                placeholder="Digite o Nome do Aluno" name="search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success btn-lg" title="Pesquisar">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                @endcan
            </div>
            <div class="col-md-8 mt-4">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                   <p><i class="fas fa-exclamation-square"></i>{{ $message }}</p>
                </div>
                @elseif($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Disciplina</th>
                <th>Equipe</th>
                <th>Data da Matricula</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($matriculas as $matricula)
            @can('view', $matricula)
            <tr>
                <td>{{ $matricula->id }}</td>
                <td>{{ $matricula->user->name }}</td>
                <td>{{ $matricula->disciplina->nome }}</td>
                <td>{{ $matricula->equipe->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($matricula->created_at)->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('matriculas.destroy',$matricula->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('matriculas.show',$matricula->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('update', $matricula)
                        <a class="btn btn-primary" href="{{ route('matriculas.edit',$matricula->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete', $matricula)
                        <button type="submit" class="btn btn-danger "
                            onclick="return confirm('Deseja mesmo Excluir a Matricula?');">
                            <i class="fas fa-trash"></i>
                        </button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endcan
            @endforeach
        </table>
        {{ $matriculas->links() }}
    </div>
</div>
@endsection
