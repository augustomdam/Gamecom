<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Fase;
use App\Medalha;
use App\Http\Controllers\Controller;

class MedalhaController extends Controller
{
    public function index(Disciplina $disciplina){
        $medalhas = Medalha::where('disciplina_id', $disciplina->id)->get();
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        return view('public.medalhas', compact('disciplina','medalhas', 'fases'));
    }
}
