<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Les use doivent être ici, avant la classe
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // On bind l'interface Fortify LoginResponse vers notre custom class
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    public function boot(): void
    {
        //
    }
}
