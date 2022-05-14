<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
        //Agregar user superadmin, al registrarse con ese correo Spatie ya reconoce todo los permisos

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super-admin') ? true : null;
        });
    }
}
