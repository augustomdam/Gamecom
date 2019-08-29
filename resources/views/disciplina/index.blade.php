@extends('layouts.app')

@section('title', 'Disciplinas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lista de Disciplinas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('disciplinas.create') }}"> Criar Disciplina</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nomme</th>
        <th>Curso</th>
        <th>Semestre</th>
        <th>Professor</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($disciplinas as $disciplina)
    <tr>
        <td>{{ $disciplina->id }}</td>
        <td>{{ $disciplina->nome }}</td>
        <td>{{ $disciplina->curso }}</td>
        <td>{{ $disciplina->semestre }}</td>
        <td>{{ $disciplina->user->name }}</td>
        <td>
            <form action="{{ route('disciplinas.destroy',$disciplina->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('disciplinas.show',$disciplina->id) }}">Mostrar</a>

                <a class="btn btn-primary" href="{{ route('disciplinas.edit',$disciplina->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection
