<?php

namespace App\Http\Controllers;

use App\Pontuacao;
use App\Fase;
use App\Funcao;
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
        $pontuacaos = Pontuacao::all();
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
        $alunos = Funcao::find(3)->users;

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

        return redirect()->route('pontuacaos.index')
                        ->with('success','Pontuação criada com Sucesso!');
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
        $alunos = Funcao::find(3)->users;
        return view('pontuacao.formEdit', compact('pontuacao','fases', 'alunos'));
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

        return redirect()->route('pontuacaos.index')
                        ->with('success','Pontuação Atualizada com Sucesso!');
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

        return redirect()->route('pontuacaos.index')
                        ->with('success','Pontuação Excluída com Sucesso!');
    }
}
