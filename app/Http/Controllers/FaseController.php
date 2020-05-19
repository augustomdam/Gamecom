<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Fase;
use App\Medalha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaseController extends Controller
{
    public function index()
    {
        $fases = Fase::paginate(20);
        return view('fase.index', compact('fases'));
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Fase::class);
        $disciplinas = Disciplina::all();
        $medalhas = Medalha::all();
        return view('fase.form', compact('disciplinas', 'medalhas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Fase::class);
        $request->validate([
            'ordem' => 'required',
            'nivel' => 'required',
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nomefase' => 'required',
            'objetivo' => 'required',
            'pontuacao' => 'required',
            'avaliacao' => 'required',
            // 'documento' => 'required|mimes:pdf,doc,docx,txt|max:10240',
            'prazo' => 'required|date',
            'medalha_id' => 'required',
            'disciplina_id' => 'required',
        ]);

        Fase::create([
            'ordem' => $request['ordem'],
            'nivel' => $request['nivel'],
            'banner' => Storage::put('fases', $request['banner'], 'public'),
            'nomefase' => $request['nomefase'],
            'objetivo' => $request['objetivo'],
            'pontuacao' => $request['pontuacao'],
            'avaliacao' => $request['avaliacao'],
            'documento' => Storage::put('fases', $request['documento'], 'public'),
            'prazo' => $request['prazo'],
            'medalha_id' => $request['medalha_id'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('fases.index')
        ->with('success','Fase criada com Sucesso!');
    }

    public function show(Fase $fase)
    {
        //autorização
        $this->authorize('view', $fase);
        return view('fase.show', compact('fase'));
    }

    public function edit(Fase $fase)
    {
        //autorização
        $this->authorize('update', $fase);
        $disciplinas = Disciplina::all();
        $medalhas = Medalha::all();
        return view('fase.formEdit', compact('fase', 'medalhas', 'disciplinas'));
    }

    public function update(Request $request, Fase $fase)
    {
        //autorização
        $this->authorize('update', $fase);
        $request->validate([
            'ordem' => 'required',
            'nivel' => 'required',
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nomefase' => 'required',
            'objetivo' => 'required',
            'pontuacao' => 'required',
            'avaliacao' => 'required',
            // 'documento' => 'required|mimes:pdf,doc,docx,txt|max:10240',
            'prazo' => 'required|date',
            'medalha_id' => 'required',
            'disciplina_id' => 'required',
        ]);
        Storage::delete($fase->banner);
        Storage::delete($fase->documento);
        $fase->update([
            'ordem' => $request['ordem'],
            'nivel' => $request['nivel'],
            'banner' => Storage::put('fases', $request['banner'], 'public'),
            'nomefase' => $request['nomefase'],
            'objetivo' => $request['objetivo'],
            'pontuacao' => $request['pontuacao'],
            'avaliacao' => $request['avaliacao'],
            'documento' => Storage::put('fases', $request['documento'], 'public'),
            'prazo' => $request['prazo'],
            'medalha_id' => $request['medalha_id'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('fases.index')
        ->with('success','Fase atualizada com Sucesso!');
    }

    public function destroy(Fase $fase)
    {
        //autorização
        $this->authorize('delete', $fase);
        $fase->delete();
        Storage::delete($fase->banner);
        Storage::delete($fase->documento);
        return redirect()->route('fases.index')
        ->with('success','Fase excluida com Sucesso!');
    }
}
