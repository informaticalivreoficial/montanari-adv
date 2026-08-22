<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientArea
{
    /**
     * Handle an incoming request.
     *
     * Only users with the 'client' role can access this area.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('client.login');
        }

        $user = Auth::user();

        if (!$user->hasRole('client')) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('client.login')
                ->withErrors(['email' => 'Acesso não autorizado para esta área.']);
        }

        if ($user->status != 1) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('client.login')
                ->withErrors(['email' => 'Sua conta está desativada. Entre em contato com o escritório.']);
        }

        return $next($request);
    }
}
