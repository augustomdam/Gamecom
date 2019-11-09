<?php

namespace App\Policies;

use App\User;
use App\Pontuacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class PontuacaoPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the pontuacao.
     *
     * @param  \App\User  $user
     * @param  \App\Pontuacao  $pontuacao
     * @return mixed
     */
    public function view(User $user, Pontuacao $pontuacao)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                return $disciplina->id == $pontuacao->disciplina_id;
            }
        } elseif ($user->isAluno()) {
            return $user->id == $pontuacao->user_id;
        }
    }

    /**
     * Determine whether the user can create pontuacaos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isProfessor()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the pontuacao.
     *
     * @param  \App\User  $user
     * @param  \App\Pontuacao  $pontuacao
     * @return mixed
     */
    public function update(User $user, Pontuacao $pontuacao)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $pontuacao->disciplina_id;
            }
        }
    }

    /**
     * Determine whether the user can delete the pontuacao.
     *
     * @param  \App\User  $user
     * @param  \App\Pontuacao  $pontuacao
     * @return mixed
     */
    public function delete(User $user, Pontuacao $pontuacao)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $pontuacao->disciplina_id;
            }
        }
    }
}
