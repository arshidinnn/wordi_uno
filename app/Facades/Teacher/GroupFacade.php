<?php

namespace App\Facades\Teacher;

use App\Services\Teacher\GroupService;
use Illuminate\Support\Facades\Facade;

/**
 *
 * @method static \Illuminate\Http\RedirectResponse store(\App\Http\Requests\Teacher\Groups\StoreGroupRequest $request)
 *
 * @see GroupService
 */
class GroupFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return GroupService::class;
    }
}
