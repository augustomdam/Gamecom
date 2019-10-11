@extends('layouts.app')

@section('title', 'Home - Gamecon')

@section('content')

@foreach ($disciplinas as $disciplina )
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'. $disciplina->pagina->banner) }}" class="card-img-top">
                <div class="card-body">
                    <h3><i class="fas fa-address-book"></i> {{$disciplina->nome}}</h3>
                    <p class="card-text"><i class="fa fa-graduation-cap"></i> {{$disciplina->curso}}</p>
                    <p class="card-text"><i class="fa fa-level-up-alt"></i> {{$disciplina->semestre}}</p>
                    <p class="card-text"> <i class="fas fa-chalkboard-teacher"></i> {{$disciplina->user->name}}</p>
                    <a class="btn btn-outline-info btn-lg" href="{{route('disciplina.detalhe',$disciplina->id) }}"
                        role="button">Ver Detalhes</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
