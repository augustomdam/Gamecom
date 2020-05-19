<?php

namespace App\Http\Controllers;

use App\Medalha;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedalhaController extends Controller
{
    public function index()
    {
        $medalhas = Medalha::paginate(20);
        return view('medalha.index', compact('medalhas'));
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Medalha::class);
        $disciplinas = Disciplina::all();
        return view('medalha.form', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Medalha::class);
        $request->validate([
            'nome' => 'required',
            // 'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'descricao' => 'required',
            'disciplina_id' => 'required',
        ]);

        Medalha::create([
            'nome' => $request['nome'],
            'imagem' => Storage::put('medalhas', $request['imagem'], 'public'),
            'descricao' => $request['descricao'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('medalhas.index')
        ->with('success','Medalha criada com Sucesso!');
    }

    public function show(Medalha $medalha)
    {
        $this->authorize('view', $medalha);
        return view('medalha.show', compact('medalha'));
    }

    public function edit(Medalha $medalha)
    {
        $this->authorize('update', $medalha);
        $disciplinas = Disciplina::all();
        return view('medalha.formEdit', compact('medalha', 'disciplinas'));
    }

    public function update(Request $request, Medalha $medalha)
    {
        $this->authorize('update', $medalha);
        $request->validate([
            'nome' => 'required',
            // 'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'descricao' => 'required',
            'disciplina_id' => 'required',
        ]);
        Storage::delete($medalha->banner);
        $medalha->update([
            'nome' => $request['nome'],
            'imagem' => Storage::put('medalhas', $request['imagem'], 'public'),
            'descricao' => $request['descricao'],
            'disciplina_id' => $request['disciplina_id'],
        ]);

        return redirect()->route('medalhas.index')
        ->with('success','Medalha atualizada com Sucesso!');
    }

    public function destroy(Medalha $medalha)
    {
        $this->authorize('delete', $medalha);
        $medalha->delete();
        Storage::delete($medalha->banner);
        return redirect()->route('medalhas.index')
        ->with('success','Medalha excluida com Sucesso!');
    }
}
