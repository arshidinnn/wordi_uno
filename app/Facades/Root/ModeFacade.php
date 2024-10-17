<?php

namespace App\Facades\Root;

use App\Services\Root\ModeService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\RedirectResponse store()
 * @method static \Illuminate\Http\RedirectResponse update(\App\Http\Requests\Root\Modes\UpdateModeRequest $request, \App\Models\Mode $mode)
 *
 * @see ModeService
 */
class ModeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ModeService::class;
    }
}
