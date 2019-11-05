<?php

namespace App\Http\Controllers;

use App\Pontuacao;
use App\Fase;
use App\Funcao;
use App\Ranking;
use App\User;
use App\Matricula;
use Illuminate\Http\Request;

class PontuacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontuacaos = Pontuacao::paginate(10);
        return view('pontuacao.index', compact('pontuacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fases = Fase::all();
        // $alunos = Funcao::find(3)->users;
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }

        return view('pontuacao.form', compact('alunos', 'fases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ponto_obtido' => 'required',
            'fase_id' => 'required',
            'user_id' => 'required',
        ]);

        Pontuacao::create($request->all());

        $ranking = Ranking::where('user_id', $request->user_id)->count();
        $disciplinas = Matricula::where('user_id', $request->user_id)->select('disciplina_id', 'equipe_id')->get();
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->disciplina_id;
            $equipe_id = $disciplina->equipe_id;
        }
        if ($ranking == 0) {

            Ranking::create([
                'user_id' => $request->user_id, 'ponto_total' => 0,
                'disciplina_id' => $disciplina_id, 'equipe_id' => $equipe_id
            ]);
            $ranking = User::find($request->user_id)->ranking();
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


        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pontuacao  $pontuacao
     * @return \Illuminate\Http\Response
     */
    public function show(Pontuacao $pontuacao)
    {
        return view('pontuacao.show', compact('pontuacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pontuacao  $pontuacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Pontuacao $pontuacao)
    {
        $fases = Fase::all();
        // $alunos = Funcao::find(3)->users;
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        return view('pontuacao.formEdit', compact('pontuacao', 'fases', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pontuacao  $pontuacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pontuacao $pontuacao)
    {
        $request->validate([
            'ponto_obtido' => 'required',
            'fase_id' => 'required',
            'user_id' => 'required',
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

        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pontuacao  $pontuacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pontuacao $pontuacao)
    {
        $pontuacao->delete();

        $pontuacaos = Pontuacao::where('user_id', $pontuacao->user_id)->sum('ponto_obtido');
        $ranking = User::find($pontuacao->user_id)->ranking();
        $ranking->update(['user_id' => $pontuacao->user_id, 'ponto_total' => $pontuacaos]);

        return redirect()->route('pontuacaos.index')
            ->with('success', 'Pontuação Excluída com Sucesso!');
    }
}
