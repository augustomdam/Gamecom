<?php

namespace App\Policies;

use App\Disciplina;
use App\User;
use App\Medalha;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedalhaPolicy
{
    use HandlesAuthorization;
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the medalha.
     *
     * @param  \App\User  $user
     * @param  \App\Medalha  $medalha
     * @return mixed
     */
    public function view(User $user, Medalha $medalha)
    {
        if ($user->isProfessor()) {
            $disciplinas = $user->disciplinas;
            foreach ($disciplinas as $disciplina) {
                $disciplina_id = $disciplina->id;
                return $disciplina_id == $medalha->disciplina_id;
            }
        } elseif ($user->isAluno()) {
            $matriculas = $user->matriculas;

            foreach ($matriculas as $matricula) {
                $disciplinas[] = $matricula->disciplina->medalhas;

                foreach ($disciplinas as $disciplina) {
                    foreach ($disciplina as $d) {
                        return $d->disciplina_id === $medalha->disciplina_id;
                    }
                }
            }
        }
    }

    /**
     * Determine whether the user can create medalhas.
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
     * Determine whether the user can update the medalha.
     *
     * @param  \App\User  $user
     * @param  \App\Medalha  $medalha
     * @return mixed
     */
    public function update(User $user, Medalha $medalha)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $medalha->disciplina_id;
        }
    }

    /**
     * Determine whether the user can delete the medalha.
     *
     * @param  \App\User  $user
     * @param  \App\Medalha  $medalha
     * @return mixed
     */
    public function delete(User $user, Medalha $medalha)
    {
        $disciplinas = $user->disciplinas;
        foreach ($disciplinas as $disciplina) {
            $disciplina_id = $disciplina->id;
            return $disciplina_id == $medalha->disciplina_id;
        }
    }
}
