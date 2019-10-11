<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Fase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class HomeController extends Controller
{
    public function index(){
        $disciplinas = Disciplina::all();
        return view('public.home', compact('disciplinas'));
    }

    public function detalhe(Disciplina $disciplina){
        $pagina = Pagina::find($disciplina->id);
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        return view('public.disciplina', compact('disciplina','pagina','fases'));
    }
}
