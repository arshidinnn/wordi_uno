<?php

namespace App\Services\Root;

use App\Facades\FileFacade as File;
use App\Http\Requests\Root\Words\StoreWordRequest;
use App\Http\Requests\Root\Words\UpdateWordRequest;
use App\Models\Word;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class WordService
{
    public function store(StoreWordRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            /** @var UploadedFile $image */
            $image = $request->file('image');
            $imagePath = File::save($image, 'words/images');

            /** @var UploadedFile $sound */
            $sound = $request->file('sound');
            $soundPath = File::save($sound, 'words/sounds');

            Word::query()->create([
                'value' => $request->string('value'),
                'image' => $imagePath,
                'sound' => $soundPath,
            ]);
        });

        return redirect()
            ->route('words.index')
            ->with('success', 'Сөз сәтті қосылды');
    }

    public function update(UpdateWordRequest $request, Word $word): RedirectResponse
    {
        DB::transaction(function() use ($request, $word) {
            if ($request->hasFile('image')) {
                $imagePath = File::update($request->file('image'), $word->image, 'words/images');
                $word->image = $imagePath;
            }

            if ($request->hasFile('sound')) {
                $soundPath = File::update($request->file('sound'), $word->sound, 'words/sounds');
                $word->sound = $soundPath;
            }

            $word->value = $request->string('value');
            $word->save();
        });

        return redirect()
            ->route('words.index')
            ->with('success', 'Сөз сәтті жаңартылды');
    }

    public function destroy(Word $word): RedirectResponse
    {
        DB::transaction(function() use ($word) {
            $soundDeleted = File::delete($word->sound);
            $imageDeleted = File::delete($word->image);

            if ($soundDeleted && $imageDeleted) {
                $word->delete();
            }
        });

        return redirect()
            ->route('words.index')
            ->with('success', 'Сөз сәтті жойылды');
    }
}
