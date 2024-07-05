<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });

        // Gate::define('ideas.destroy', function (User $user, Idea $idea): bool {
        //     return (bool) $user->is_admin || $user->id === $idea->user_id;
        // });

        // Gate::define('ideas.edit', function (User $user, Idea $idea): bool {
        //     return (bool) $user->is_admin || $user->id === $idea->user_id;
        // });

        //ასე შეგვიძლი შევცვალოთ ენა, რომელიც არის config/app.php-ში.
        // app()->setLocale('ka');
        Paginator::useBootstrapFive();
    }
}
