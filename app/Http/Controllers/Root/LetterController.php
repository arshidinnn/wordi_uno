<?php

namespace App\Http\Controllers\Root;

use App\Facades\Root\LetterFacade as LetterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Root\Letters\UpdateLetterRequest;
use App\Models\Letter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LetterController extends Controller
{
    public function index(): View {
        $letters = Letter::query()->orderBy('value')->get();
        return view('root.letters.index', compact('letters'));
    }

    public function store(): RedirectResponse
    {
        return LetterService::store();
    }

    public function edit(Letter $letter): View {
        return view('root.letters.edit', compact('letter'));
    }

    public function update(UpdateLetterRequest $request, Letter $letter): RedirectResponse
    {
        return LetterService::update($request, $letter);
    }

}
