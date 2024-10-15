<?php

namespace App\Facades\Root;

use App\Services\Root\LetterService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\RedirectResponse store()
 * @method static \Illuminate\Http\RedirectResponse update(\App\Http\Requests\Root\Letters\UpdateLetterRequest $request, \App\Models\Letter $letter)
 *
 * @see LetterService
 */
class LetterFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return LetterService::class;
    }
}
