@extends('layouts.app')

@section('title', 'Home - Gamecom')

@section('content')

@foreach ($disciplinas as $disciplina )
<div class="container mt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-3">
            <div class="card">
                <img src="{{ url("http://gamecomstorage.s3-sa-east-1.amazonaws.com/". $disciplina->pagina->banner) }}" class="card-img-top">
                <div class="card-body">
                    <h3><i class="fas fa-address-book"></i> {{$disciplina->nome}}</h3>
                    <p class="card-text">Curso: {{$disciplina->curso}} <i class="fa fa-graduation-cap"></i></p>
                    <p class="card-text">Instituição: {{$disciplina->instituicao}} <i class="fas fa-university"></i><p>
                    <p class="card-text">Semestre: {{$disciplina->semestre}} <i class="fa fa-level-up-alt"></i></p>
                    <p class="card-text"> Professor: {{$disciplina->user->name}} <i class="fas fa-chalkboard-teacher"></i></p>
                    <a class="btn btn-outline-primary btn-lg" href="{{route('disciplina.detalhe',$disciplina->id) }}"
                        role="button"><i class="fas fa-eye"></i> Visualizar</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
