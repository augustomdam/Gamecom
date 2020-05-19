<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Pontuacao;
use App\Fase;
use App\Funcao;
use App\Ranking;
use App\User;
use App\Matricula;
use App\RankingEquipe;
use Illuminate\Http\Request;

class PontuacaoController extends Controller
{
    public function index()
    {
        $pontuacaos = Pontuacao::paginate(30);
        return view('pontuacao.index', compact('pontuacaos'));
    }

    public function buscar(Request $request)
    {
        $search = $request->get('search');
        $aluno = User::where('name', 'LIKE', '%' . $search . '%')->get();
        if ($aluno->isEmpty() || $search == null) {
            return redirect()->route('pontuacaos.index')
                ->with('warning', 'Pontuação não encontrada!');
        } else {
            foreach ($aluno as $a) {
                $pontuacaos = Pontuacao::where('user_id', $a->id)
                                ->paginate(10);
            }

            return view('pontuacao.index', compact('pontuacaos'));
        }
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Pontuacao::class);
        $fases = Fase::all();
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        $disciplinas = Disciplina::all();

        return view('pontuacao.form', compact('alunos', 'fases', 'disciplinas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Pontuacao::class);

        // $fases = Fase::where('id', $request->fase_id)->get();
        // foreach ($fases as $fase) {
        //     $pontuacao = $fase->pontuacao;
        // }
        $request->validate([
            'ponto_obtido' => 'required',
            'fase_id' => 'required',
            'user_id' => 'required',
            'disciplina_id' => 'required',
        ]);

        Pontuacao::create($request->all());

        $ranking = Ranking::where('user_id', $request->user_id)->count();

        $matriculas = Matricula::where('user_id', $request->user_id)->select('disciplina_id', 'equipe_id')->get();
        foreach ($matriculas as $matricula) {
            $disciplina_id = $matricula->disciplina_id;
            $equipe_id = $matricula->equipe_id;
        }

        $ranking_equipes = RankingEquipe::where('equipe_id', $equipe_id)->count();

        if ($ranking == 0) {

            Ranking::create([
                'user_id' => $request->user_id, 'ponto_total' => 0,
                'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
            ]);
            $ranking = Ranking::where('user_id', $request->user_id);
            $pontuacaos = Pontuacao::where('user_id', $request->user_id)->sum('ponto_obtido');
            $ranking->update(['ponto_total' => $pontuacaos]);
        } else {
            $pontuacaos = Pontuacao::where('user_id', $request->user_id)->sum('ponto_obtido');
            $ranking = Ranking::where('user_id', $request->user_id);
            $ranking->update([
                'user_id' => $request->user_id, 'ponto_total' => $pontuacaos,
                'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
            ]);
        }

        if ($ranking_equipes == 0) {

            RankingEquipe::create([
                'user_id' => $request->user_id, 'ponto_total' => 0,
                'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
            ]);
            $ranking_equipes = RankingEquipe::where('equipe_id', $equipe_id);
            $pontuacaos = Ranking::where('equipe_id', $equipe_id)->max('ponto_total');
            $ranking_equipes->update(['ponto_total' => $pontuacaos]);
        } else {
            $pontuacaos = Ranking::where('equipe_id', $equipe_id)->max('ponto_total');
            $ranking_equipes = RankingEquipe::where('equipe_id', $equipe_id);
            $ranking_equipes->update([
                'user_id' => $request->user_id, 'ponto_total' => $pontuacaos,
                'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
            ]);
        }

        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação criada com Sucesso!');
    }

    public function show(Pontuacao $pontuacao)
    {
        //autorização
        $this->authorize('view', $pontuacao);
        return view('pontuacao.show', compact('pontuacao'));
    }

    public function edit(Pontuacao $pontuacao)
    {
        //autorização
        $this->authorize('update', $pontuacao);
        $fases = Fase::all();
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        $disciplinas = Disciplina::all();
        return view('pontuacao.formEdit', compact('pontuacao', 'fases', 'alunos', 'disciplinas'));
    }

    public function update(Request $request, Pontuacao $pontuacao)
    {
        //autorização
        $this->authorize('update', $pontuacao);

        // $fases = Fase::where('id', $request->fase_id)->get();
        // foreach ($fases as $fase) {
        //     $pontuacao = $fase->pontuacao;
        // }

        $request->validate([
            'ponto_obtido' => 'required',
            'fase_id' => 'required',
            'user_id' => 'required',
            'disciplina_id' => 'required',
        ]);

        $pontuacao->update($request->all());

        $disciplinas = Matricula::where('user_id', $request->user_id)->select('disciplina_id', 'equipe_id')->get();
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->disciplina_id;
            $equipe_id = $disciplina->equipe_id;
        }
        $pontuacaos = Pontuacao::where('user_id', $request->user_id)->sum('ponto_obtido');
        $ranking = User::find($request->user_id)->ranking();
        $ranking->update([
            'user_id' => $request->user_id, 'ponto_total' => $pontuacaos,
            'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
        ]);

        $pontuacaos = Ranking::where('equipe_id', $equipe_id)->max('ponto_total');
        $ranking_equipes = RankingEquipe::where('equipe_id', $equipe_id);
        $ranking_equipes->update([
            'ponto_total' => $pontuacaos, 'equipe_id' => $equipe_id
        ]);

        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação Atualizada com Sucesso!');
    }

    public function destroy(Pontuacao $pontuacao)
    {
        //autorização
        $this->authorize('delete', $pontuacao);
        $pontuacao->delete();

        $pontuacaos = Pontuacao::where('user_id', $pontuacao->user_id)->sum('ponto_obtido');
        $ranking = User::find($pontuacao->user_id)->ranking();
        $ranking->update(['user_id' => $pontuacao->user_id, 'ponto_total' => $pontuacaos]);

        $matriculas = Matricula::where('user_id', $pontuacao->user_id)->get();
        foreach ($matriculas as $matricula) {
            $equipe_id = $matricula->equipe_id;
        }

        $users = Ranking::where('equipe_id', $equipe_id)->select('user_id')->get();
        foreach ($users as $user) {
            if ($user->user_id != $pontuacao->user_id) {
                $user_id = $user->user_id;
            }
        }

        $pontuacao_equipe = Ranking::where('equipe_id', $equipe_id)->max('ponto_total');
        $ranking_equipes = RankingEquipe::where('equipe_id', $equipe_id);
        $ranking_equipes->update([
            'user_id' => $user_id,
            'ponto_total' => $pontuacao_equipe
        ]);

        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação Excluída com Sucesso!');
    }
}
