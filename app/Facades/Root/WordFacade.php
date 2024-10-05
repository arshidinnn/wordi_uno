<?php

namespace App\Facades\Root;

use App\Services\Root\WordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static RedirectResponse store(\App\Http\Requests\Words\StoreWordRequest $request)
 * @method static RedirectResponse update(\App\Http\Requests\Words\UpdateWordRequest $request, \App\Models\Word $word)
 * @method static RedirectResponse destroy(\App\Models\Word $word)
 *
 * @see WordService
 */
class WordFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WordService::class;
    }
}
