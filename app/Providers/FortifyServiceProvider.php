<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\LoginResponse;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    public function boot()
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Optionnel : authentification personnalisée
        Fortify::authenticateUsing(function ($request) {
            // Ta logique perso ici, ou rien
        });
    }
}
