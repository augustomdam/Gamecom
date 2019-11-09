@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$disciplinas}}</h3>
                    <p>Disciplinas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="{{route('disciplinas.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$paginas}}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-bookmarks"></i>
                </div>
                <a href="{{route('paginas.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users}}</h3>
                    <p>Usuários Registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('user.list')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$medalhas}}</h3>
                    <p>Medalhas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-medal"></i>
                </div>
                <a href="{{route('medalhas.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$equipes}}</h3>
                    <p>Equipes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{route('equipes.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$fases}}</h3>
                    <p>Fases</p>
                </div>
                <div class="icon">
                    <i class="ion ion-levels"></i>
                </div>
                <a href="{{route('fases.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$gamificacaos}}</h3>
                    <p>Gamificações</p>
                </div>
                <div class="icon">
                    <i class="fa fa-gamepad"></i>
                </div>
                <a href="{{route('gamificacaos.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$pontuacaos}}</h3>
                    <p>Pontuações</p>
                </div>
                <div class="icon">
                    <i class="fa fa-chart-area"></i>
                </div>
                <a href="{{route('pontuacaos.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$funcaos}}</h3>
                    <p>Funções</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('funcaos.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- <div class="col-lg-6 col-6">
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>{{$permissaos}}</h3>
                    <p>Permissões</p>
                </div>
                <div class="icon">
                    <i class="ion ion-lock-combination"></i>
                </div>
                <a href="{{route('permissaos.index')}}" class="small-box-footer">
                    Mais Informações
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> --}}
    </div>
</div>






@endsection
