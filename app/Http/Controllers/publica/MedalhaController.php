<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Fase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedalhaController extends Controller
{
    public function index(Disciplina $disciplina){
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        return view('public.medalhas', compact('disciplina','fases'));
    }
}
