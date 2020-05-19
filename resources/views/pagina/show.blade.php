@extends('adminlte::page')

@section('title', 'Paginas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-bars "></i> Detalhando Página</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Banner</th>
                <th>Corpo</th>
                {{-- <th>Tipo</th> --}}
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            <tr>
                <td>{{ $pagina->id }}</td>
                <td>{{ $pagina->titulo }}</td>
                <td><img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $pagina->banner) }}"
                alt="{{$pagina->banner}}" height="10%"></td>
                <td>{{ $pagina->corpo }}</td>
                {{-- <td>{{ $pagina->tipo }}</td> --}}
                <td>{{ $pagina->disciplina->nome }}</td>
                <td>
                    <form action="{{ route('paginas.destroy',$pagina->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('paginas.index') }}">
                                <i class="fas fa-undo-alt"></i>
                        </a>
                        <a class="btn btn-primary" href="{{ route('paginas.edit',$pagina->id) }}" >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Pagina?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
