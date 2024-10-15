<?php

namespace App\Http\Controllers\Root;

use App\Facades\Root\NumberFacade as NumberService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Root\Numbers\UpdateNumberRequest;
use App\Models\Number;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NumberController extends Controller
{
    public function index(): View
    {
        $numbers = Number::query()->orderBy('value')->get();
        return view('root.numbers.index', compact('numbers'));
    }

    public function store(): RedirectResponse
    {
        return NumberService::store();
    }

    public function edit(Number $number): View {
        return view('root.numbers.edit', compact('number'));
    }

    public function update(UpdateNumberRequest $request, Number $number): RedirectResponse
    {
        return NumberService::update($request, $number);
    }
}
