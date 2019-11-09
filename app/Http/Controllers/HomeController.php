<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Equipe;
use App\Medalha;
use App\Pagina;
use App\User;
use App\Fase;
use App\Funcao;
use App\Gamificacao;
use App\Permissao;
use App\Pontuacao;
use App\Ranking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $disciplinas = Disciplina::all()->count();
        $paginas = Pagina::all()->count();
        $users = User::all()->count();
        $medalhas = Medalha::all()->count();
        $equipes = Equipe::all()->count();
        $fases = Fase::all()->count();
        $gamificacaos = Gamificacao::all()->count();
        $pontuacaos = Pontuacao::all()->count();
        $funcaos = Funcao::all()->count();
        return view('home', compact(
            'disciplinas', 'paginas', 'users',
            'medalhas', 'equipes','fases',
            'gamificacaos', 'pontuacaos', 'funcaos'
        ));
    }
}
