<?php

namespace App\Http\Requests\Root\Words;

use Illuminate\Foundation\Http\FormRequest;

class StoreWordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|string|max:255',
            'sound' => 'required|file|mimes:mp3,wav|max:5120',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }
}
