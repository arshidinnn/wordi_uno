<?php

namespace App\Facades;

use App\Services\UserService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\User createUserForGroup(\App\Models\Group $group, string $firstname, string $lastname)
 *
 * @see UserService
 */
class UserFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return UserService::class;
    }
}
