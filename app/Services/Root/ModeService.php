<?php

namespace App\Services\Root;

use App\Facades\FileFacade as File;
use App\Http\Requests\Root\Modes\UpdateModeRequest;
use App\Models\Mode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ModeService
{
    public function store(): RedirectResponse
    {
        Artisan::call('create:modes');

        return redirect()
            ->route('modes.index')
            ->with('success', 'Режимдер сәтті жасалды.');
    }

    public function update(UpdateModeRequest $request, Mode $mode): RedirectResponse
    {
        if (!$request->hasFile('image')) {
            return redirect()
                ->route('modes.index');
        }

        DB::transaction(function() use ($request, $mode) {
            $image = $request->file('image');

            $imagePath = $mode->image
                ? File::update($image, $mode->image, 'modes/images')
                : File::save($image, 'modes/images');

            $mode->update(['image' => $imagePath]);
        });

        return redirect()
            ->route('modes.index')
            ->with('success', 'Режимнің суреті сәтті жаңартылды');
    }
}
