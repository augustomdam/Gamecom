<?php

namespace App\Policies;

use App\User;
use App\Pagina;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaginaPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

    }

    /**
     * Determine whether the user can view the pagina.
     *
     * @param  \App\User  $user
     * @param  \App\Pagina  $pagina
     * @return mixed
     */
    public function view(User $user, Pagina $pagina)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $pagina->disciplina_id;
        }
    }

    /**
     * Determine whether the user can create paginas.
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
     * Determine whether the user can update the pagina.
     *
     * @param  \App\User  $user
     * @param  \App\Pagina  $pagina
     * @return mixed
     */
    public function update(User $user, Pagina $pagina)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $pagina->disciplina_id;
        }
    }

    /**
     * Determine whether the user can delete the pagina.
     *
     * @param  \App\User  $user
     * @param  \App\Pagina  $pagina
     * @return mixed
     */
    public function delete(User $user, Pagina $pagina)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $pagina->disciplina_id;
        }
    }
}
