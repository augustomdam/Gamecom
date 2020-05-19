<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Disciplina;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DisciplinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $disciplinas = Disciplina::paginate(10);
        return view('disciplina.index', compact('disciplinas'));
    }

    public function create()
    {
        $this->authorize('create', Disciplina::class);
        return view('disciplina.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'curso' => 'required',
            'instituicao' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
        ]);

        $this->authorize('create', Disciplina::class);

        Disciplina::create([
            'nome' => $request['nome'],
            'curso' => $request['curso'],
            'instituicao' => $request['instituicao'],
            'semestre' => $request['semestre'],
            'user_id' => $request['user_id']
        ]);

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina criada com Sucesso!');
    }

    public function show(Disciplina $disciplina)
    {
        return view('disciplina.show', compact('disciplina'));
    }


    public function edit(Disciplina $disciplina)
    {
        $this->authorize('update', $disciplina);
        return view('disciplina.formEdit', compact('disciplina'));
    }

    public function update(Request $request, Disciplina $disciplina)
    {
        $request->validate([
            'nome' => 'required',
            'curso' => 'required',
            'instituicao' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
        ]);

        $this->authorize('update', $disciplina);
        $disciplina->update([
            'nome' => $request['nome'],
            'curso' => $request['curso'],
            'instituicao' => $request['instituicao'],
            'semestre' => $request['semestre'],
            'user_id' => $request['user_id']

        ]);

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina atualizada com Sucesso!');
    }

    public function destroy(Disciplina $disciplina)
    {
        $this->authorize('delete', $disciplina);
        $disciplina->delete();

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina excluida com Sucesso!');
    }
}
