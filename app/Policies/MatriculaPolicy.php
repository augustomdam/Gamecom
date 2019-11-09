<?php

namespace App\Policies;

use App\User;
use App\Matricula;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatriculaPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function view(User $user, Matricula $matricula)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $matricula->disciplina_id;
            }
        }elseif ($user->isAluno()) {
            return $user->id == $matricula->user_id;
        }
    }

    /**
     * Determine whether the user can create matriculas.
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
     * Determine whether the user can update the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function update(User $user, Matricula $matricula)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $matricula->disciplina_id;
            }
        }
    }

    /**
     * Determine whether the user can delete the matricula.
     *
     * @param  \App\User  $user
     * @param  \App\Matricula  $matricula
     * @return mixed
     */
    public function delete(User $user, Matricula $matricula)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $matricula->disciplina_id;
            }
        }
    }
}
