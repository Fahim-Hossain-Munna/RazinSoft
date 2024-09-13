<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('createtask', function (User $user) {
            return $user->role === 'admin' || $user->role === 'employee' && $user->permission_create;
        });
        Gate::define('assigntask', function (User $user) {
            return $user->role === 'admin' || $user->role === 'employee' && $user->permission_assign;
        });
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin' || $user->role === 'employee' && $user->permission_create && $user->permission_assign;
        });
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

    }
}
