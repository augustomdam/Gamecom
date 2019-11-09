<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Gamificacao;
use Illuminate\Http\Request;

class GamificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamificacaos = Gamificacao::paginate(10);;
        return view('gamificacao.index', compact('gamificacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //autorização
        $this->authorize('create', Gamificacao::class);
        $disciplinas = Disciplina::all();
        return view('gamificacao.form', compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Gamificacao::class);
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc_fases_pontos' => 'required',
            'desc_desafios_estrategias' => 'required',
            'desc_medalhas' => 'required',
            'desc_ranking_premiacao' => 'required',
            'disciplina_id' => 'required|unique:gamificacaos,disciplina_id',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();

        Gamificacao::create([
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'desc_fases_pontos' => $request['desc_fases_pontos'],
            'desc_desafios_estrategias' => $request['desc_desafios_estrategias'],
            'desc_medalhas' => $request['desc_medalhas'],
            'desc_ranking_premiacao' => $request['desc_ranking_premiacao'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gamificacao  $gamificacao
     * @return \Illuminate\Http\Response
     */
    public function show(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('view', $gamificacao);
        return view('gamificacao.show',compact('gamificacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gamificacao  $gamificacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $disciplinas = Disciplina::all();
        return view('gamificacao.formEdit', compact('gamificacao','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gamificacao  $gamificacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc_fases_pontos' => 'required',
            'desc_desafios_estrategias' => 'required',
            'desc_medalhas' => 'required',
            'desc_ranking_premiacao' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();

        $gamificacao->update([
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'desc_fases_pontos' => $request['desc_fases_pontos'],
            'desc_desafios_estrategias' => $request['desc_desafios_estrategias'],
            'desc_medalhas' => $request['desc_medalhas'],
            'desc_ranking_premiacao' => $request['desc_ranking_premiacao'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gamificacao  $gamificacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $gamificacao->delete();
        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação Excluida com Sucesso!');
    }
}
