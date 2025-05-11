<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function boot(): void {}
    public static function home()
    {
        return Auth::check() && Auth::user()->is_admin ? '/admin' : '/dashboard';
    }

    public static function redirectTo()
    {
        return Auth::user()->is_admin ? '/admin' : '/dashboard';
    }
}
