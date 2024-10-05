<?php

namespace App\Facades;

use App\Services\AuthService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\RedirectResponse register(\App\Http\Requests\RegisterRequest $request)
 * @method static \Illuminate\Http\RedirectResponse login(\App\Http\Requests\LoginRequest $request)
 * @method static \Illuminate\Http\RedirectResponse logout()
 *
 * @see AuthService
 */
class AuthFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return AuthService::class;
    }
}
