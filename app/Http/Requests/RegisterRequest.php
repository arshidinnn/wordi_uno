<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|min:6',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
}
