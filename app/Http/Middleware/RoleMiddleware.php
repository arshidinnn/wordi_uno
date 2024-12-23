<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user || $user->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
