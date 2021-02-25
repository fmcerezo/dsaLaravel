<?php

namespace App\Providers;

use App\Http\Controllers\Auth\EloquentAdministradorProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('administradores_auth', function ($app, array $config) {
            $model = $app['config']['auth.providers.administradores.model'];
            return new EloquentAdministradorProvider($app['hash'], $model);
        });
    }
}
