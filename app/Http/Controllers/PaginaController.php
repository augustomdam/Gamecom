<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaginaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paginas = Pagina::paginate(10);
        return view('pagina.index', compact('paginas'));
    }

    public function create()
    {
        //autorização
        $this->authorize('create', Pagina::class);
        $disciplinas = Disciplina::all();
        return view('pagina.form', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        //autorização
        $this->authorize('create', Pagina::class);
        $request->validate([
            'titulo' => 'required',
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'corpo' => 'required',
            'disciplina_id' => 'required|unique:paginas,disciplina_id',
        ]);

        Pagina::create([
            'titulo' => $request['titulo'],
            'banner' => Storage::put('paginas', $request['banner'], 'public'),
            'corpo' => $request['corpo'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('paginas.index')
            ->with('success', 'Pagina criada com Sucesso!');
    }

    public function show(Pagina $pagina)
    {
        //autorização
        $this->authorize('view', $pagina);
        return view('pagina.show', compact('pagina'));
    }

    public function edit(Pagina $pagina)
    {
        //autorização
        $this->authorize('update', $pagina);
        $disciplinas = Disciplina::all();
        return view('pagina.formEdit', compact('pagina'));
    }

    public function update(Request $request, Pagina $pagina)
    {
        $this->authorize('update', $pagina);
        $request->validate([
            'titulo' => 'required',
            // 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'corpo' => 'required',
            'disciplina_id' => 'required',
        ]);
        Storage::delete($pagina->banner);
        $pagina->update([
            'titulo' => $request['titulo'],
            'banner' => Storage::put('paginas', $request['banner'], 'public'),
            'corpo' => $request['corpo'],
            'disciplina_id' => $request['disciplina_id']
        ]);

        return redirect()->route('paginas.index')
            ->with('success', 'Pagina atualizada com Sucesso!');
    }

    public function destroy(Pagina $pagina)
    {
        //autorização
        $this->authorize('delete', $pagina);
        $pagina->delete();
        Storage::delete($pagina->banner);
        return redirect()->route('paginas.index')
            ->with('success', 'Pagina excluida com Sucesso!');
    }
}
