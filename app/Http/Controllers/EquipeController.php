<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipe.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('equipe.form', compact('disciplinas'));
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
            'nome' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->logo->getClientOriginalExtension();

        Equipe::create([
            'nome' => $request['nome'],
            'logo' => $request['logo']->storeAs('imagem', $imageName),
            'disciplina_id' => $request['disciplina_id']
        ]);
        return redirect()->route('equipes.index')
        ->with('success','Equipe criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        return view('equipe.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $disciplinas = Disciplina::all();
        return view('equipe.formEdit', compact('equipe', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nome' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->logo->getClientOriginalExtension();

        $equipe->update([
            'nome' => $request['nome'],
            'logo' => $request['logo']->storeAs('imagem', $imageName),
            'disciplina_id' => $request['disciplina_id']
        ]);
        return redirect()->route('equipes.index')
        ->with('success','Equipe Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index')
        ->with('success','Equipe Excluida com Sucesso!');
    }
}