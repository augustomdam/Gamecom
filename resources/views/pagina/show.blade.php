@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Detalhando Pagina</h2>
    </div>
    <div class="card-body">
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
            <tr>
                    <td>{{ $pagina->id }}</td>
                    <td>{{ $pagina->titulo }}</td>
                    <td><img src="{{ asset('storage/'. $pagina->banner) }}"
                    alt="{{$pagina->banner}}" width="100px" height="50px"></td>
                    <td>{{ $pagina->corpo }}</td>
                    <td>{{ $pagina->tipo }}</td>
                    <td>{{ $pagina->disciplina->nome }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('paginas.index') }}">
                                <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </td>
            </tr>
        </table>
    </div>
</div>
@endsection
