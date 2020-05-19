<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::paginate(10);
        return view('equipe.index', compact('equipes'));
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Equipe::class);
        $disciplinas = Disciplina::all();
        return view('equipe.form', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Equipe::class);
        $request->validate([
            'nome' => 'required',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'disciplina_id' => 'required',
        ]);

        Equipe::create([
            'nome' => $request['nome'],
            'logo' => Storage::put('equipes', $request['logo'], 'public'),
            'disciplina_id' => $request['disciplina_id']
        ]);
        return redirect()->route('equipes.index')
        ->with('success','Equipe criada com Sucesso!');
    }

    public function show(Equipe $equipe)
    {
        //autorização
        $this->authorize('view', $equipe);
        return view('equipe.show', compact('equipe'));
    }

    public function edit(Equipe $equipe)
    {
        //autorização
        $this->authorize('update', $equipe);
        $disciplinas = Disciplina::all();
        return view('equipe.formEdit', compact('equipe', 'disciplinas'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        //autorização
        $this->authorize('update', $equipe);
        $request->validate([
            'nome' => 'required',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'disciplina_id' => 'required',
        ]);
        Storage::delete($equipe->logo);
        $equipe->update([
            'nome' => $request['nome'],
            'logo' => Storage::put('equipes', $request['logo'], 'public'),
            'disciplina_id' => $request['disciplina_id']
        ]);
        return redirect()->route('equipes.index')
        ->with('success','Equipe Atualizada com Sucesso!');
    }

    public function destroy(Equipe $equipe)
    {
        //autorização
        $this->authorize('delete', $equipe);
        $equipe->delete();
        Storage::delete($equipe->logo);
        return redirect()->route('equipes.index')
        ->with('success','Equipe Excluida com Sucesso!');
    }
}
