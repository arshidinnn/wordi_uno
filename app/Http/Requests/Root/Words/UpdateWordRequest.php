<?php

namespace App\Http\Requests\Root\Words;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|string|max:255',
            'sound' => 'nullable|file|mimes:mp3,wav|max:5120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }
}
