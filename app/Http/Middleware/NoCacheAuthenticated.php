<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Impede o cache de páginas autenticadas (web/client) pelo navegador.
 *
 * Sem isso, após o logout o navegador restaura a página anterior do cache
 * (bfcache) e o Livewire tenta reidratar com sessão/token já invalidados,
 * recebendo 419 "Página expirada".
 */
class NoCacheAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        // Importante: checar auth APÓS $next(), pois este middleware é global e
        // roda antes do grupo `web` (que inicia a sessão). Só depois da sessão
        // iniciada é possível saber se o usuário está autenticado.
        $response = $next($request);

        // Admin e cliente autenticam no guard 'web' (o cliente é diferenciado por role).
        if (auth('web')->check()) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }

        return $response;
    }
}
