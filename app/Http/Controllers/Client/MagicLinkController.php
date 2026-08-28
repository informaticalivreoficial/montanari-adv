<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\MagicLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicLinkController extends Controller
{
    /**
     * Valida o token do magic link e autentica o usuário.
     */
    public function verify(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        if (!$token || !$email) {
            return redirect()->route('client.login')
                ->withErrors(['email' => 'Link inválido ou expirado. Solicite um novo acesso.']);
        }

        $magicLink = MagicLink::where('token', $token)
            ->where('email', $email)
            ->first();

        if (!$magicLink || !$magicLink->isValid()) {
            return redirect()->route('client.login')
                ->withErrors(['email' => 'Link inválido ou expirado. Solicite um novo acesso.']);
        }

        $user = $magicLink->user;

        if (!$user || !$user->hasRole('client') || $user->status != 1) {
            return redirect()->route('client.login')
                ->withErrors(['email' => 'Conta desativada. Entre em contato com o escritório.']);
        }

        // Marcar token como usado
        $magicLink->markAsUsed();

        // Autenticar
        Auth::login($user, true);
        session()->regenerate();

        return redirect()->intended(route('client.dashboard'));
    }
}
