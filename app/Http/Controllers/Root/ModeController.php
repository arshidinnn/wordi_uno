<?php

namespace App\Http\Controllers\Root;

use App\Facades\Root\ModeFacade as ModeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Root\Modes\UpdateModeRequest;
use App\Models\Mode;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ModeController extends Controller
{
    public function index(): View
    {
        $modes = Mode::query()->orderBy('subject')->get();
        return view('root.modes.index', compact('modes'));
    }

    public function store(): RedirectResponse
    {
        return ModeService::store();
    }

    public function edit(Mode $mode): View
    {
        return view('root.modes.edit', compact('mode'));
    }

    public function update(UpdateModeRequest $request, Mode $mode): RedirectResponse
    {
        return ModeService::update($request, $mode);
    }
}
