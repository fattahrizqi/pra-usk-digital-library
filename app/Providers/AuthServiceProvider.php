<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('member', function (User $user) {
            return $user->role == 'member';
        });

        Gate::define('admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('admin_librarian', function (User $user) {
            return $user->role == 'admin' || $user->role == 'librarian';
        });
    }
}
