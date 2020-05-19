<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Gamificacao;
use App\Fase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamificacaoController extends Controller
{
    public function index(Disciplina $disciplina){
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        $gamificacaos = Gamificacao::where('disciplina_id', $disciplina->id)->get();
        foreach($gamificacaos as $gamificacao){}
        // dd($gamificacao);
        return view('public.gamificacao', compact('disciplina', 'fases', 'gamificacao'));
    }
}
