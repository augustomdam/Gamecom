<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Equipe;
use App\Funcao;
use App\Matricula;
use App\User;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::paginate(20);
        return view('matricula.index', compact('matriculas'));
    }

    public function buscar(Request $request)
    {
        $search = $request->get('search');
        $aluno = User::where('name', 'LIKE', '%' . $search . '%')->get();
        if ($aluno->isEmpty() || $search == null) {
            return redirect()->route('matriculas.index')
                        ->with('warning', 'Matricula não encontrada!');
        } else {
            foreach ($aluno as $a) {
                $matriculas = Matricula::where('user_id', $a->id)
                                ->paginate(10);
            }

            return view('matricula.index', compact('matriculas'));
        }
    }
    public function create()
    {
        //autorização
        $this->authorize('create', Matricula::class);
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        $disciplinas = Disciplina::all();
        $equipes = Equipe::all();

        return view('matricula.form', compact('alunos', 'disciplinas', 'equipes'));
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
        $this->authorize('create', Matricula::class);
        $request->validate([
            'disciplina_id' => 'required',
            'user_id' => 'required',
            'equipe_id' => 'required',
        ]);

        Matricula::create($request->all());

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //autorização
        $this->authorize('view', $matricula);
        return view('matricula.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //autorização
        $this->authorize('update', $matricula);
        $aluno = Funcao::where('nome', 'aluno')->get();
        foreach ($aluno as $a) {
            $alunos = Funcao::find($a->id)->users;
        }
        $disciplinas = Disciplina::all();
        $equipes = Equipe::all();

        return view('matricula.formEdit', compact('matricula', 'alunos', 'disciplinas', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //autorização
        $this->authorize('update', $matricula);
        $request->validate([
            'disciplina_id' => 'required',
            'user_id' => 'required',
            'equipe_id' => 'required',
        ]);

        $matricula->update($request->all());

        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //autorização
        $this->authorize('delete', $matricula);
        $matricula->delete();
        return redirect()->route('matriculas.index')
            ->with('success', 'Matricula excluida com Sucesso!');
    }
}
