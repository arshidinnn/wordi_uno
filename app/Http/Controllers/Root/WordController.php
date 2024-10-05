<?php

namespace App\Http\Controllers\Root;

use App\Facades\Root\WordFacade as WordService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Words\StoreWordRequest;
use App\Http\Requests\Words\UpdateWordRequest;
use App\Models\Word;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WordController extends Controller
{
    public function index(): View
    {
        $words = Word::query()->get();
        return view('root.words.index', compact('words'));
    }

    public function create(): View
    {
        return view('root.words.create');
    }

    public function store(StoreWordRequest $request): RedirectResponse
    {
        return WordService::store($request);
    }

    public function show(Word $word): View
    {
        return view('root.words.show', compact('word'));
    }

    public function edit(Word $word): View
    {
        return view('root.words.edit', compact('word'));
    }

    public function update(UpdateWordRequest $request,Word $word): RedirectResponse
    {
        return WordService::update($request, $word);
    }

    public function destroy(Word $word): RedirectResponse
    {
        return WordService::destroy($word);
    }
}
