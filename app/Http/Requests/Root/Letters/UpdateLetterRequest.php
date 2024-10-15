<?php

namespace App\Http\Requests\Root\Letters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLetterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sound' => 'required|file|mimes:mp3,wav|max:5120',
        ];
    }
}
