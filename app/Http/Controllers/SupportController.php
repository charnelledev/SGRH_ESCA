<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Exemple : enregistrement en base ou envoi par mail
        try {
            // Simule une sauvegarde ou envoi de message
            Log::info('Message de support reçu', [
                'user' => Auth::user()->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Optionnel : envoi de mail
            // Mail::to('support@esca-rh.com')->send(new SupportMail(...));

            return back()->with('success', 'Votre message a bien été envoyé à notre équipe de support.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du message de support : ' . $e->getMessage());

            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer plus tard.');
        }
    }
}
