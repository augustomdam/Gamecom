@extends('adminlte::page')

@section('title', 'Fases')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h2>Detalhando Fase</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                <tr>
                    <th>Ordem</th>
                    <th>Tipo</th>
                    <th>Banner</th>
                    <th>Nome</th>
                    <th>Objetivo</th>
                    <th>Pontuação</th>
                    <th>Avaliação</th>
                    <th>Documento</th>
                    <th>Prazo</th>
                    <th>Medalha</th>
                    <th>Disciplina</th>
                    <th colspan="3">Ações</th>
                </tr>
                <tr>
                    <td>{{ $fase->ordem }}</td>
                    <td>{{ $fase->tipo }}</td>
                    <td><img src="{{ asset('storage/'. $fase->banner) }}"
                    alt="{{$fase->banner}}" width="100px" height="50px"></td>
                    <td>{{ $fase->nomefase }}</td>
                    <td>{{ $fase->objetivo }}</td>
                    <td>{{ $fase->pontuacao }}</td>
                    <td>{{ $fase->avaliacao }}</td>
                    <td><a href="{{ asset('storage/'. $fase->documento) }}">
                    <i class="fas fa-file"> {{$fase->documento}}</i>
                    </a></td>
                    <td>{{ \Carbon\Carbon::parse($fase->prazo)->format('d/m/Y')}}</td>
                    <td><img src="{{ asset('storage/'. $fase->medalha->imagem) }}"
                        alt="{{$fase->banner}}" width="100px" height="50px"></td>
                    <td>{{ $fase->medalha->nome}}</td>
                    <td>
                        <form action="{{ route('fases.destroy',$fase->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('fases.index') }}">
                                <i class="fas fa-undo"></i>
                            </a>

                            <a class="btn btn-primary" href="{{ route('fases.edit',$fase->id) }}" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Deseja mesmo Excluir a Fase?');">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>
                    </td>
                </tr>
        </table>
    </div>
</div>
@endsection
