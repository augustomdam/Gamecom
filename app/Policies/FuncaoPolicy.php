<?php

namespace App\Policies;

use App\User;
use App\Funcao;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncaoPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the funcao.
     *
     * @param  \App\User  $user
     * @param  \App\Funcao  $funcao
     * @return mixed
     */
    public function view(User $user, Funcao $funcao)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create funcaos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the funcao.
     *
     * @param  \App\User  $user
     * @param  \App\Funcao  $funcao
     * @return mixed
     */
    public function update(User $user, Funcao $funcao)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the funcao.
     *
     * @param  \App\User  $user
     * @param  \App\Funcao  $funcao
     * @return mixed
     */
    public function delete(User $user, Funcao $funcao)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
