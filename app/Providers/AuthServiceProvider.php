<?php

namespace App\Providers;

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

        Gate::define('delete-post', function ($user, $post) {
            return $post->user->is($user);
        });

        Gate::define('edit-post', function ($user, $post) {
            return $post->user->is($user);
        });

        Gate::before(function ($user, $ability) {
            if ($user->abilities()->contains($ability)) {
                return true;
            }
        });

    }
}
