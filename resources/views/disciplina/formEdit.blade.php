@extends('adminlte::page')

@section('title', 'Disciplinas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Editar Disciplina</h2>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('disciplinas.index') }}">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Problemas ao Atualizar Disciplina.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">

                    <form action="{{ route('disciplinas.update', $disciplina->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGrouptext">Disciplina</label>
                                    </div>
                                    <input type="text" name="nome" id="inputGrouptext" value="{{$disciplina->nome}}" class="form-control"
                                        placeholder="Disciplina">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Curso</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="curso">
                                        <option selected>{{$disciplina->curso}}</option>
                                        <option value="Agronomia">Agronomia</option>
                                        <option value="Ciencias Naturais">Ciencias Naturais</option>
                                        <option value="Pedagogia">Pedagogia</option>
                                        <option value="Sistema de Informacao">Sistema de Informacao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Semestre</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect02" name="semestre">
                                        <option selected>{{$disciplina->semestre}}</option>
                                        <option value="Primeiro">Primeiro</option>
                                        <option value="Segundo">Segundo</option>
                                        <option value="Terceiro">Terceiro</option>
                                        <option value="Quarto">Quarto</option>
                                        <option value="Quinto">Quinto</option>
                                        <option value="Sexto">Sexto</option>
                                        <option value="Setimo">Setimo</option>
                                        <option value="Oitavo">Oitavo</option>
                                        <option value="Nono">Nono</option>
                                        <option value="Decimo">Decimo</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Deseja mesmo Atualizar esta Disciplina?');">
                                    <i class="fas fa-sync-alt"></i> Atualizar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
