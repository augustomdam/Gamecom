<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Fase;
use App\Medalha;
use Illuminate\Http\Request;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fases = Fase::paginate(10);
        return view('fase.index', compact('fases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //autorização
        $this->authorize('create', Fase::class);
        $disciplinas = Disciplina::all();
        $medalhas = Medalha::all();
        return view('fase.form', compact('disciplinas', 'medalhas'));
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
        $this->authorize('create', Fase::class);
        $request->validate([
            'ordem' => 'required',
            'tipo' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nomefase' => 'required',
            'objetivo' => 'required',
            'pontuacao' => 'required',
            'avaliacao' => 'required',
            'documento' => 'required|mimes:pdf,doc,docx,txt|max:10240',
            'prazo' => 'required|date',
            'medalha_id' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();
        $docName = time().'.'.request()->documento->getClientOriginalExtension();
        Fase::create([
            'ordem' => $request['ordem'],
            'tipo' => $request['tipo'],
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'nomefase' => $request['nomefase'],
            'objetivo' => $request['objetivo'],
            'pontuacao' => $request['pontuacao'],
            'avaliacao' => $request['avaliacao'],
            'documento' => $request['documento']->storeAs('docs', $docName),
            'prazo' => $request['prazo'],
            'medalha_id' => $request['medalha_id'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('fases.index')
        ->with('success','Fase criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function show(Fase $fase)
    {
        //autorização
        $this->authorize('view', $fase);
        return view('fase.show', compact('fase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function edit(Fase $fase)
    {
        //autorização
        $this->authorize('update', $fase);
        $disciplinas = Disciplina::all();
        $medalhas = Medalha::all();
        return view('fase.formEdit', compact('fase', 'medalhas', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fase $fase)
    {
        //autorização
        $this->authorize('update', $fase);
        $request->validate([
            'ordem' => 'required',
            'tipo' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'nomefase' => 'required',
            'objetivo' => 'required',
            'pontuacao' => 'required',
            'avaliacao' => 'required',
            'documento' => 'required|mimes:pdf,doc,docx,txt|max:10240',
            'prazo' => 'required|date',
            'medalha_id' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();
        $docName = time().'.'.request()->documento->getClientOriginalExtension();
        $fase->update([
            'ordem' => $request['ordem'],
            'tipo' => $request['tipo'],
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'nomefase' => $request['nomefase'],
            'objetivo' => $request['objetivo'],
            'pontuacao' => $request['pontuacao'],
            'avaliacao' => $request['avaliacao'],
            'documento' => $request['documento']->storeAs('docs', $docName),
            'prazo' => $request['prazo'],
            'medalha_id' => $request['medalha_id'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('fases.index')
        ->with('success','Fase atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fase $fase)
    {
        //autorização
        $this->authorize('delete', $fase);
        $fase->delete();
        return redirect()->route('fases.index')
        ->with('success','Fase excluida com Sucesso!');
    }
}
