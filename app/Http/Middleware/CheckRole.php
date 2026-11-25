<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Cek apakah user sudah login
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Cek apakah role user sesuai
        if (!$user->hasRole(...$roles)) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}