<?php

namespace App\Services\Root;

use App\Http\Requests\Letters\UpdateLetterRequest;
use App\Facades\FileFacade as File;
use App\Models\Letter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class LetterService
{
    public function store(): RedirectResponse
    {
        Artisan::call('create:letters');

        return redirect()
            ->route('letters.index')
            ->with('success', __('Letters created successfully.'));
    }

    public function update(UpdateLetterRequest $request, Letter $letter): RedirectResponse
    {
        if (!$request->hasFile('sound')) {
            return redirect()
                ->route('letters.index');
        }

        DB::transaction(function() use ($request, $letter) {
            $sound = $request->file('sound');

            $soundPath = $letter->sound
                ? File::update($sound, $letter->sound, 'letters/sounds')
                : File::save($sound, 'letters/sounds');

            $letter->update(['sound' => $soundPath]);
        });

        return redirect()
            ->route('letters.index')
            ->with('success', __('Sound for letter updated successfully'));
    }
}
