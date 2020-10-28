<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->hasRole('admin')) { //admin
               return true;
            }
        });

        Gate::before(function ($user, $ability) {
            if ($user->abilities()->contains($ability)) {
                return true;
            }
        });

        Gate::define('like', function ($user) {
//            dd($user);
            if ($user->posts()->count() > 0) {
                return true;
            }
        });

        Gate::define('myPost', [PostPolicy::class, 'myPost']);

    }
}
