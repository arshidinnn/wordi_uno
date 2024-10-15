<?php

namespace App\Services\Root;

use App\Facades\FileFacade as File;
use App\Http\Requests\Root\Numbers\UpdateNumberRequest;
use App\Models\Number;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class NumberService
{
    public function store(): RedirectResponse
    {
        Artisan::call('create:numbers');
        return redirect()
            ->route('numbers.index')
            ->with('success', __('Numbers created successfully'));
    }

    public function update(UpdateNumberRequest $request, Number $number): RedirectResponse
    {
        if (!$request->hasFile('sound')) {
            return redirect()
                ->route('numbers.index');
        }

        DB::transaction(function() use ($request, $number) {
            $sound = $request->file('sound');

            $soundPath = $number->sound
                ? File::update($sound, $number->sound, 'numbers/sounds')
                : File::save($sound, 'numbers/sounds');

            $number->update(['sound' => $soundPath]);
        });

        return redirect()
            ->route('numbers.index')
            ->with('success', __('Sound for number updated successfully'));
    }
}
