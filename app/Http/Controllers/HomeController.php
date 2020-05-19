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
use App\Matricula;
use App\Pontuacao;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->isAdmin()) {
            $disciplinas = Disciplina::all()->count();
            $paginas = Pagina::all()->count();
            $users = User::all()->count();
            $medalhas = Medalha::all()->count();
            $equipes = Equipe::all()->count();
            $fases = Fase::all()->count();
            $gamificacaos = Gamificacao::all()->count();
            $pontuacaos = Pontuacao::all()->count();
            $funcaos = Funcao::all()->count();
            $matriculas = Matricula::all()->count();
            return view('home', compact(
                'disciplinas',
                'paginas',
                'users',
                'medalhas',
                'equipes',
                'fases',
                'gamificacaos',
                'pontuacaos',
                'funcaos',
                'matriculas'
            ));
        } elseif (Auth::user()->isProfessor()) {

            $disciplinas = Disciplina::where('user_id', Auth::user()->id)->count();
            $disciplinass = Disciplina::where('user_id', Auth::user()->id)->get();
            if ($disciplinass == null) {
                $paginas = 0;
                $medalhas = 0;
                $equipes = 0;
                $fases = 0;
                $gamificacaos = 0;
                $pontuacaos = 0;
                $funcaos = 0;
                $matriculas = 0;
            } else {
                foreach ($disciplinass as $disciplina) {
                    $paginas = Pagina::where('disciplina_id', $disciplina->id)->count();
                    $medalhas = Medalha::where('disciplina_id', $disciplina->id)->count();
                    $equipes = Equipe::where('disciplina_id', $disciplina->id)->count();
                    $fases = Fase::where('disciplina_id', $disciplina->id)->count();
                    $gamificacaos = Gamificacao::where('disciplina_id', $disciplina->id)->count();
                    $pontuacaos = Pontuacao::where('disciplina_id', $disciplina->id)->count();
                    $matriculas = Matricula::where('disciplina_id', $disciplina->id)->count();
                }
            }
            return view('home', compact(
                'disciplinas',
                'paginas',
                'medalhas',
                'equipes',
                'fases',
                'gamificacaos',
                'pontuacaos',
                'matriculas'
            ));
        } elseif (Auth::user()->isaluno()) {
            $pontuacaos = Pontuacao::where('user_id', Auth::user()->id)->count();
            $matriculas = Matricula::where('user_id', Auth::user()->id)->count();

            return view('home', compact(
                'pontuacaos',
                'matriculas'
            ));
        }
    }
}
