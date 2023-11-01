<?php

namespace App\Http\Middleware;

use App\Jobs\AccessAuditEmailJob;
use App\Models\AccessAudit;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccessAuditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $routeName = $request->route()->getName();

        $allowedRoutes = [
            'revisar',
            'crear',
            'validar',
        ];

        $isAllowed = false;

        if ($user && in_array($routeName, $allowedRoutes)) {
            if (($user->name === 'usuario1' && in_array($routeName, ['revisar', 'crear'])) ||
                ($user->name === 'admin' && in_array($routeName, ['crear', 'validar']))) {
                $isAllowed = true;
            }
        }

        AccessAudit::create([
            'nombre_usuario' => $user ? $user->name : 'Invitado',
            'ruta' => $routeName,
            'permitido' => $isAllowed,
        ]);

        if (!$isAllowed) {
            AccessAuditEmailJob::dispatch(Auth::id());
            return abort(403, 'Acceso no permitido');
        }

        return $next($request);
    }
}
