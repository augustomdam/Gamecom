<?php

namespace App\Policies;

use App\User;
use App\Gamificacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamificacaoPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

    }
    /**
     * Determine whether the user can view the gamificacao.
     *
     * @param  \App\User  $user
     * @param  \App\Gamificacao  $gamificacao
     * @return mixed
     */
    public function view(User $user, Gamificacao $gamificacao)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $gamificacao->disciplina_id;
        }
    }

    /**
     * Determine whether the user can create gamificacaos.
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
     * Determine whether the user can update the gamificacao.
     *
     * @param  \App\User  $user
     * @param  \App\Gamificacao  $gamificacao
     * @return mixed
     */
    public function update(User $user, Gamificacao $gamificacao)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $gamificacao->disciplina_id;
        }
    }

    /**
     * Determine whether the user can delete the gamificacao.
     *
     * @param  \App\User  $user
     * @param  \App\Gamificacao  $gamificacao
     * @return mixed
     */
    public function delete(User $user, Gamificacao $gamificacao)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $gamificacao->disciplina_id;
        }
    }
}
