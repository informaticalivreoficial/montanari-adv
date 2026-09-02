<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdminAccess
{
    /**
     * Permite acesso à área administrativa somente a usuários com papel de administrador.
     * Um cliente autenticado é redirecionado para a sua própria área.
     */
    public function handle(Request $request, Closure $next)
    {
        // O middleware 'auth' (do grupo) já garantiu que o usuário está autenticado.
        $user = Auth::user();

        if ($user->hasRole('client')) {
            return redirect()->route('client.dashboard');
        }

        if ($user->status != 1 || ! $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
