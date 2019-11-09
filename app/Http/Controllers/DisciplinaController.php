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
        // mas, você pode fazer uso dos métodos fluentes: only e except
        // ex.: $this->middleware('auth')->only(['create', 'store']);
        // ex.: $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplina::paginate(10);
        return view('disciplina.index', compact('disciplinas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Disciplina::class);
        return view('disciplina.form');
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
            'curso' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
        ]);

        $this->authorize('create', Disciplina::class);

        Disciplina::create($request->all());

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplina.show', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        $this->authorize('update', $disciplina);
        return view('disciplina.formEdit', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $request->validate([
            'nome' => 'required',
            'curso' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
        ]);

        $this->authorize('update', $disciplina);
        $disciplina->update($request->all());

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        $this->authorize('delete', $disciplina);
        $disciplina->delete();

        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina excluida com Sucesso!');
    }
}
