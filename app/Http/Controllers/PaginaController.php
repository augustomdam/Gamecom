<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
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
        $paginas = Pagina::all();
        return view('pagina.index', compact('paginas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('pagina.form', compact('disciplinas'));
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
            'titulo' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'corpo' => 'required',
            'tipo' => 'required',
            'disciplina_id' => 'required|unique:paginas,disciplina_id',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();

        Pagina::create([
            'titulo' => $request['titulo'],
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'corpo' => $request['corpo'],
            'tipo' => $request['tipo'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('paginas.index')
                        ->with('success','Pagina criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        return view('pagina.show',compact('pagina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        $disciplinas = Disciplina::all();
        return view('pagina.formEdit',compact('pagina', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        $request->validate([
            'titulo' => 'required',
            'banner' => 'required',
            'corpo' => 'required',
            'tipo' => 'required',
            'disciplina_id' => 'required',
        ]);

        $imageName = time().'.'.request()->banner->getClientOriginalExtension();

        $pagina->update([
            'titulo' => $request['titulo'],
            'banner' => $request['banner']->storeAs('imagem', $imageName),
            'corpo' => $request['corpo'],
            'tipo' => $request['tipo'],
            'disciplina_id' => $request['disciplina_id']
        ]);
        return redirect()->route('paginas.index')
                        ->with('success','Pagina atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        $pagina->delete();
        return redirect()->route('paginas.index')
                        ->with('success','Pagina excluida com Sucesso!');

    }
}
