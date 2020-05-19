<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Gamificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamificacaoController extends Controller
{
    public function index()
    {
        $gamificacaos = Gamificacao::paginate(10);;
        return view('gamificacao.index', compact('gamificacaos'));
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Gamificacao::class);
        $disciplinas = Disciplina::all();
        return view('gamificacao.form', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Gamificacao::class);
        $request->validate([
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc_fases_pontos' => 'required',
            'desc_desafios_estrategias' => 'required',
            'desc_medalhas' => 'required',
            'desc_ranking_premiacao' => 'required',
            'disciplina_id' => 'required|unique:gamificacaos,disciplina_id',
        ]);

        Gamificacao::create([
            'banner' => Storage::put('gamificacaos', $request['banner'], 'public'),
            'desc_fases_pontos' => $request['desc_fases_pontos'],
            'desc_desafios_estrategias' => $request['desc_desafios_estrategias'],
            'desc_medalhas' => $request['desc_medalhas'],
            'desc_ranking_premiacao' => $request['desc_ranking_premiacao'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação criada com Sucesso!');
    }

    public function show(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('view', $gamificacao);
        return view('gamificacao.show',compact('gamificacao'));
    }

    public function edit(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $disciplinas = Disciplina::all();
        return view('gamificacao.formEdit', compact('gamificacao','disciplinas'));
    }

    public function update(Request $request, Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $request->validate([
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc_fases_pontos' => 'required',
            'desc_desafios_estrategias' => 'required',
            'desc_medalhas' => 'required',
            'desc_ranking_premiacao' => 'required',
            'disciplina_id' => 'required',
        ]);
        Storage::delete($gamificacao->banner);
        $gamificacao->update([
            'banner' => Storage::put('gamificacaos', $request['banner'], 'public'),
            'desc_fases_pontos' => $request['desc_fases_pontos'],
            'desc_desafios_estrategias' => $request['desc_desafios_estrategias'],
            'desc_medalhas' => $request['desc_medalhas'],
            'desc_ranking_premiacao' => $request['desc_ranking_premiacao'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação Atualizada com Sucesso!');
    }

    public function destroy(Gamificacao $gamificacao)
    {
        //autorização
        $this->authorize('update', $gamificacao);
        $gamificacao->delete();
        Storage::delete($gamificacao->banner);
        return redirect()->route('gamificacaos.index')
                        ->with('success','Gamificação Excluida com Sucesso!');
    }
}
