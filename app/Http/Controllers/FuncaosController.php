<?php

namespace App\Http\Controllers;

use App\Funcao;
use Illuminate\Http\Request;

class FuncaosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcaos = Funcao::paginate(15);

        foreach ($funcaos as $funcao) {
            $permissaos = $funcao->permissaos();

            # code...
        }
    //    dd($permissaos);
        return view('funcaos.index', compact('funcaos','permissaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcaos.form');
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

        Funcao::create($request->all());

        return redirect()->route('funcaos.index')
                        ->with('success','Função criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show(Funcao $funcao)
    {
        return view('funcaos.show',compact('funcao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcao $funcao)
    {
        return view('funcaos.form_edit',compact('funcao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcao $funcao)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $funcao->update($request->all());

        return redirect()->route('funcaos.index')
                        ->with('success','Função atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcao $funcao)
    {
        $funcao->delete();

        return redirect()->route('funcaos.index')
                        ->with('success','Função excluida com Sucesso!');
    }

}
