<?php

namespace App\Policies;

use App\User;
use App\Fase;
use Illuminate\Auth\Access\HandlesAuthorization;

class FasePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the fase.
     *
     * @param  \App\User  $user
     * @param  \App\Fase  $fase
     * @return mixed
     */
    public function view(User $user, Fase $fase)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $fase->disciplina_id;
        }
    }

    /**
     * Determine whether the user can create fases.
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
     * Determine whether the user can update the fase.
     *
     * @param  \App\User  $user
     * @param  \App\Fase  $fase
     * @return mixed
     */
    public function update(User $user, Fase $fase)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $fase->disciplina_id;
        }
    }

    /**
     * Determine whether the user can delete the fase.
     *
     * @param  \App\User  $user
     * @param  \App\Fase  $fase
     * @return mixed
     */
    public function delete(User $user, Fase $fase)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $fase->disciplina_id;
        }
    }
}
