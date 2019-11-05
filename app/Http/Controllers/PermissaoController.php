<?php

namespace App\Http\Controllers;

use App\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissaos = Permissao::paginate(15);
        return view('permissao.index', compact('permissaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissao.form');
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
            'nome' => 'required'
        ]);

        Permissao::create($request->all());

        return redirect()->route('permissaos.index')
                        ->with('success','Permissão criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function show(Permissao $permissao)
    {
        return view('permissao.show',compact('permissao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function edit(Permissao $permissao)
    {
        return view('permissao.form_edit',compact('permissao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permissao $permissao)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $permissao->update($request->all());

        return redirect()->route('permissaos.index')
                        ->with('success','Permissão atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permissao $permissao)
    {
        $permissao->delete();

        return redirect()->route('permissaos.index')
                        ->with('success','Permissão excluida com Sucesso!');
    }
}
