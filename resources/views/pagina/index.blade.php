@extends('adminlte::page')

@section('title', 'Paginas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Lista de Páginas</h2>
        <div class="pull-right">
            @can('create', App\Pagina::class)
                <a class="btn btn-info" href="{{ route('paginas.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Pagina
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
                <th>Titulo</th>
                <th>Banner</th>
                <th>Corpo</th>
                <th>Tipo</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($paginas as $pagina)
                @can('view', $pagina)
                    <tr>
                        <td>{{ $pagina->id }}</td>
                        <td>{{ $pagina->titulo }}</td>
                        <td>{{ $pagina->banner }}</td>
                        <td>{{ $pagina->corpo }}</td>
                        <td>{{ $pagina->tipo }}</td>
                        <td>{{ $pagina->disciplina->nome }}</td>
                        <td>
                            <form action="{{ route('paginas.destroy',$pagina->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('paginas.show',$pagina->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-primary" href="{{ route('paginas.edit',$pagina->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "
                                    onclick="return confirm('Deseja mesmo Excluir a Pagina?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
        {{ $paginas->links() }}
    </div>
</div>
@endsection
