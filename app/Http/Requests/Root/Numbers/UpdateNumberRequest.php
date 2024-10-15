<?php

namespace App\Http\Requests\Root\Numbers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNumberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sound' => 'required|file|mimes:mp3,wav|max:5120',
        ];
    }
}
