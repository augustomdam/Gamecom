<?php

namespace App\Providers;

use App\Disciplina;
use App\Pagina;
use App\User;
use App\Policies\DisciplinaPolicy;
use App\Policies\EquipePolicy;
use App\Policies\PaginaPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Disciplina::class => DisciplinaPolicy::class,
        Pagina::class => PaginaPolicy::class,
        Equipe::class => EquipePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ocultaMenuDisciplinas', function (User $user) {
            return $user->isAdmin() || $user->isProfessor();
        });
        Gate::define('ocultaMenuUsuarios', function (User $user) {
            return $user->isAdmin();
        });

        //
    }
}
