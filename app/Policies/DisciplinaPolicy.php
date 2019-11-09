<?php

namespace App\Policies;

use App\User;
use App\Disciplina;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisciplinaPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

    }
    /**
     * Determine whether the user can view the disciplina.
     *
     * @param  \App\User  $user
     * @param  \App\Disciplina  $disciplina
     * @return mixed
     */
    public function view(User $user, Disciplina $disciplina)
    {
        return $user->id == $disciplina->user_id;
    }

    /**
     * Determine whether the user can create disciplinas.
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
     * Determine whether the user can update the disciplina.
     *
     * @param  \App\User  $user
     * @param  \App\Disciplina  $disciplina
     * @return mixed
     */
    public function update(User $user, Disciplina $disciplina)
    {
        return $user->id == $disciplina->user_id;
    }

    /**
     * Determine whether the user can delete the disciplina.
     *
     * @param  \App\User  $user
     * @param  \App\Disciplina  $disciplina
     * @return mixed
     */
    public function delete(User $user, Disciplina $disciplina)
    {
        return $user->id == $disciplina->user_id;
    }
}
