<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Traite la tentative de connexion.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Les informations ne correspondent pas.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // ✅ Redirection basée sur le champ "role"
        switch ($user->role) {
            case 'admin':
                Session::flash('success', 'Bienvenue dans votre espace administrateur, ' . $user->name . ' !');
                return redirect()->route('admin.dashboard');

            case 'employe':
            default:
                Session::flash('success', 'Bienvenue sur votre tableau de bord, ' . $user->name . ' !');
                return redirect()->route('employee.dashboard');
        }
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
