<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|min:6|max:100',
            'password' => 'required|string|min:6|max:150',
        ];
    }
}
