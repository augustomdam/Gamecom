<?php

namespace App\Policies;

use App\User;
use App\Disciplina;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisciplinaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any disciplinas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
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
        //
    }

    /**
     * Determine whether the user can create disciplinas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
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
        //
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
        //
    }

    /**
     * Determine whether the user can restore the disciplina.
     *
     * @param  \App\User  $user
     * @param  \App\Disciplina  $disciplina
     * @return mixed
     */
    public function restore(User $user, Disciplina $disciplina)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the disciplina.
     *
     * @param  \App\User  $user
     * @param  \App\Disciplina  $disciplina
     * @return mixed
     */
    public function forceDelete(User $user, Disciplina $disciplina)
    {
        //
    }
}
