<?php

namespace App\Policies;

use App\User;
use App\Equipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

    }
    /**
     * Determine whether the user can view the equipe.
     *
     * @param  \App\User  $user
     * @param  \App\Equipe  $equipe
     * @return mixed
     */
    public function view(User $user, Equipe $equipe)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $equipe->disciplina_id;
        }
    }

    /**
     * Determine whether the user can create equipes.
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
     * Determine whether the user can update the equipe.
     *
     * @param  \App\User  $user
     * @param  \App\Equipe  $equipe
     * @return mixed
     */
    public function update(User $user, Equipe $equipe)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $equipe->disciplina_id;
        }
    }

    /**
     * Determine whether the user can delete the equipe.
     *
     * @param  \App\User  $user
     * @param  \App\Equipe  $equipe
     * @return mixed
     */
    public function delete(User $user, Equipe $equipe)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $equipe->disciplina_id;
        }
    }
}
