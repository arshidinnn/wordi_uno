<?php

namespace App\Facades\Root;

use App\Services\Root\NumberService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\RedirectResponse store()
 * @method static \Illuminate\Http\RedirectResponse update(\App\Http\Requests\Root\Numbers\UpdateNumberRequest $request, \App\Models\Number $number)
 *
 * @see NumberService
 */
class NumberFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return NumberService::class;
    }
}
