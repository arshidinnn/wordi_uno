<?php

namespace App\Http\Requests\Teacher\Groups;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'users' => 'nullable|array',
            'users.*.firstname' => 'required|string|max:255',
            'users.*.lastname' => 'required|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'users.*.firstname' => __('firstname'),
            'users.*.lastname' => __('lastname'),
            'name' => __('group name'),
        ];
    }
}
