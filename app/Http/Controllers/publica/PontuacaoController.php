<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Funcao;
use App\Fase;
use App\Http\Controllers\Controller;
use App\Pontuacao;
use App\Ranking;

class PontuacaoController extends Controller
{
    public function index(Disciplina $disciplina)
    {
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();

        $ranking_alunos = Ranking::where('disciplina_id', $disciplina->id)->select('user_id', 'ponto_total')
            ->orderBy('ponto_total', 'DESC')->get();
        $ranking_equipe = Ranking::where('disciplina_id', $disciplina->id)->select('equipe_id', 'ponto_total')
            ->orderBy('ponto_total', 'DESC')->get();

        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        foreach ($alunos as $aluno) {
            $medalhas[$aluno->id] = Pontuacao::where('user_id', $aluno->id)->select('fase_id')
                                    ->get();
        }

        // $rankings = array_merge($ranking_alunos, $medalhas);
        // dd($medalhas);
        return view('public.ranking', compact(
            'disciplina',
            'fases',
            'ranking_alunos',
            'ranking_equipe',
            'medalhas'
        ));
    }
}
