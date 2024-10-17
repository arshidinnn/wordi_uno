<?php

namespace App\Http\Requests\Root\Modes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];
    }
}
