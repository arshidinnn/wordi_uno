<?php

namespace App\Http\Requests\Teacher\Task;

use App\Enums\NumberRange;
use App\Enums\SubjectTypes;
use App\Enums\TaskTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => ['required', new Enum(TaskTypes::class)],
            'subject' => ['required', new Enum(SubjectTypes::class)],
            'mode' => ['required', 'exists:modes,name'],
            'target_type' => 'required|string|in:group,user',
            'group_id' => ['nullable', 'required_if:target_type,group', 'exists:groups,id'],
            'user_id' => ['nullable', 'required_if:target_type,user', 'exists:users,id'],

            'number_range' => ['nullable', 'required_if:subject,number', new Enum(NumberRange::class),],
            'timers_enabled' => 'required|boolean',
            'timer_type' => ['nullable', 'required_if:timers_enabled,1', 'string', 'in:iteration_timer,overall_timer'],
            'timer_value' => ['nullable', 'required_if:timers_enabled,1', 'integer', 'min:5'],
            'question_count' => ['nullable', 'required_if:type,test', 'integer', 'min:1'],
            'show_corrected_answer' => 'required|boolean',
            'deadline' => ['nullable', 'date_format:Y-m-d\TH:i'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $mode = $this->input('mode');
            $subject = $this->input('subject');

            if ($mode === 'number' && $subject === 'number') {
                $validator->addRules([
                    'number_range' => ['required', new Enum(NumberRange::class)],
                ]);
            }
        });
    }
}
