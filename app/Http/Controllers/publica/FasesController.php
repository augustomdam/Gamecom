<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Fase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FasesController extends Controller
{
    public function index(Disciplina $disciplina)
    {
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        return view('public.fases', compact('disciplina', 'fases'));
    }

    public function show(Disciplina $disciplina, Fase $fase)
    {
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        $faseShow = Fase::find($fase->id);
        return view('public.fase', compact('disciplina', 'fases', 'faseShow'));
    }
}
