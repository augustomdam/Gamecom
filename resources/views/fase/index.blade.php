@extends('adminlte::page')

@section('title', 'Fases')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2><i class="fas fa-laptop-code "></i> Lista de Fases</h2>
        <div class="pull-right">
            @can('create', App\Fase::class)
                <a class="btn btn-info" href="{{ route('fases.create') }}">
                    <i class="fas fa-plus-circle"></i> Criar Fase
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
                <th>Ordem</th>
                <th>Nível</th>
                <th>Nome</th>
                <th>Banner</th>
                <th>Objetivo</th>
                <th>Pontuação</th>
                <th>Avaliação</th>
                <th>Documento</th>
                <th>Prazo</th>
                <th>Medalha</th>
                <th>Disciplina</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($fases as $fase)
                @can('view', $fase)
                    <tr>
                        <td>{{ $fase->ordem }}</td>
                        <td>{{ $fase->nivel }}</td>
                        <td>{{ $fase->nomefase }}</td>
                        <td><img src="{{url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $fase->banner) }}"
                            alt="{{$fase->banner}}" height="10%"></td>
                        <td>{{ $fase->objetivo }}</td>
                        <td>{{ $fase->pontuacao }}</td>
                        <td>{{ $fase->avaliacao }}</td>
                        <td><a href="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $fase->documento) }}">
                            <i class="fas fa-file"> {{$fase->nomefase}}</i>
                        @if ($fase->prazo >= date('Y-m-d'))
                            <td class="text-green">{{ \Carbon\Carbon::parse($fase->prazo)->format('d/m/Y') }}</td>
                        @else
                            <td class="text-danger"><s>{{ \Carbon\Carbon::parse($fase->prazo)->format('d/m/Y') }}</s></td>
                        @endif
                        <td><img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $fase->medalha->imagem) }}"
                            alt="{{$fase->medalha->imagem}}" height="10%"></td>
                        <td>{{ $fase->disciplina->nome }}</td>
                        <td>
                            <form action="{{ route('fases.destroy',$fase->id) }}" method="POST">
                                <a class="btn btn-warning" href="{{ route('fases.show',$fase->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a class="btn btn-primary" href="{{ route('fases.edit',$fase->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "
                                    onclick="return confirm('Deseja mesmo Excluir a Fase?');">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </table>
        {{ $fases->links() }}
    </div>
</div>
@endsection
