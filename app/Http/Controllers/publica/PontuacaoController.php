<?php

namespace App\Http\Controllers\publica;

use App\Disciplina;
use App\Equipe;
use App\Funcao;
use App\Fase;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Pontuacao;

class PontuacaoController extends Controller
{
    public function index(Disciplina $disciplina)
    {
        $fases = Fase::where('disciplina_id', $disciplina->id)->get();
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        foreach ($alunos as $aluno) {
            $pontuacaos[$aluno->id] = Pontuacao::where('user_id', $aluno->id)
                                        ->orderBy('ponto_obtido', 'DESC')->get();

            $notas[$aluno->id] = $pontuacaos[$aluno->id]->sum('ponto_obtido');
            $matriculas[$aluno->id] = Matricula::where('user_id', $aluno->id)
                                                ->select('equipe_id')->get();
            foreach ($matriculas as $equipes) {
                foreach ($equipes as $equip) {
                    $equipe[$aluno->id] = Equipe::find($equip->equipe_id);
                }
            }

        }

        return view('public.ranking', compact('disciplina', 'fases', 'matriculas', 'equipe','pontuacaos', 'notas'));
    }
}
