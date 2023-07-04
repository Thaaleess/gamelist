<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        User::observe(UserObserver::class);
        Paginator::useBootstrap();

        view()->composer(['components.adminlayout','components.userlayout', 'search.index', 'components.userlayoutsidebar'], function ($view){
            $user = Auth::user();
            $view->with('user', $user);
        });
    }
}
