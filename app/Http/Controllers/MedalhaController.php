<?php

namespace App\Http\Controllers;

use App\Medalha;
use App\Disciplina;
use Illuminate\Http\Request;

class MedalhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medalhas = Medalha::paginate(10);;
        return view('medalha.index', compact('medalhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //autorização
        $this->authorize('create', Medalha::class);
        $disciplinas = Disciplina::all();
        return view('medalha.form', compact('disciplinas'));
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
        $this->authorize('create', Medalha::class);
        $request->validate([
            'nome' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'descricao' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->imagem->getClientOriginalExtension();

        Medalha::create([
            'nome' => $request['nome'],
            'imagem' => $request['imagem']->storeAs('imagem', $imageName),
            'descricao' => $request['descricao'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('medalhas.index')
        ->with('success','Medalha criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medalha  $medalha
     * @return \Illuminate\Http\Response
     */
    public function show(Medalha $medalha)
    {
        $this->authorize('view', $medalha);
        return view('medalha.show', compact('medalha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medalha  $medalha
     * @return \Illuminate\Http\Response
     */
    public function edit(Medalha $medalha)
    {
        $this->authorize('update', $medalha);
        $disciplinas = Disciplina::all();
        return view('medalha.formEdit', compact('medalha', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medalha  $medalha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medalha $medalha)
    {
        $this->authorize('update', $medalha);
        $request->validate([
            'nome' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'descricao' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->imagem->getClientOriginalExtension();

        $medalha->update([
            'nome' => $request['nome'],
            'imagem' => $request['imagem']->storeAs('imagem', $imageName),
            'descricao' => $request['descricao'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('medalhas.index')
        ->with('success','Medalha atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medalha  $medalha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medalha $medalha)
    {
        $this->authorize('delete', $medalha);
        $medalha->delete();
        return redirect()->route('medalhas.index')
        ->with('success','Medalha excluida com Sucesso!');
    }
}
