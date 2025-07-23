<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware globaux appliqués à toutes les requêtes HTTP.
     *
     * @var array
     */
    protected $middleware = [
        // Gestion des proxies (ex: pour HTTPS derrière un load balancer)
        \App\Http\Middleware\TrustProxies::class,

        // Gère le Cross-Origin Resource Sharing (CORS)
        \Fruitcake\Cors\HandleCors::class,

        // Maintenance mode (page "En maintenance" si activé)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Limite la taille des requêtes POST
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Supprime les espaces inutiles dans les chaînes de caractères
        \App\Http\Middleware\TrimStrings::class,

        // Convertit les chaînes vides en NULL
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Groupes de middleware pour les routes "web" et "api".
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Crypte les cookies
            \App\Http\Middleware\EncryptCookies::class,

            // Ajoute les cookies dans la réponse
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,

            // Démarre la session utilisateur
            \Illuminate\Session\Middleware\StartSession::class,

            // Authentifie la session (optionnel)
            // \Illuminate\Session\Middleware\AuthenticateSession::class,

            // Partage les erreurs avec les vues (pour validation)
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // Protège contre les attaques CSRF
            \App\Http\Middleware\VerifyCsrfToken::class,

            // Lie les paramètres de route aux modèles
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Limite le nombre de requêtes (rate limiting)
            'throttle:api',

            // Lie les paramètres de route aux modèles
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware utilisables individuellement dans les routes.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Middleware personnalisés à ajouter (à créer toi-même)
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'is_employee' => \App\Http\Middleware\IsEmployee::class,
    ];
}
