<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Funcao;
use App\Fase;
use App\Http\Controllers\Controller;
use App\Pontuacao;
use App\Ranking;
use App\RankingEquipe;
use Illuminate\Support\Facades\DB;

class PontuacaoController extends Controller
{
    public function index(Disciplina $disciplina)
    {
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();

        $ranking_alunos = Ranking::where('disciplina_id', $disciplina->id)->select('user_id', 'ponto_total')
            ->orderBy('ponto_total', 'DESC')->get();
            // dd($ranking_alunos);

        $ranking_equipe = RankingEquipe::where('disciplina_id', $disciplina->id)
                            ->orderBy('ponto_total', 'DESC')
                                ->get();

        // dd($ranking_equipe);
        return view('public.ranking', compact(
            'disciplina',
            'fases',
            'ranking_alunos',
            'ranking_equipe'
        ));
    }
    public function getMedalhas($user_id){
        return Pontuacao::where('user_id', $user_id)->get();
    }

    // public function getEquipes($equipe_id){
    //     return Ranking::where('equipe_id', $equipe_id)->max('ponto_total');
    // }

}
