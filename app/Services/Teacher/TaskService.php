<?php

namespace App\Services\Teacher;

use App\Http\Requests\Teacher\Task\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        /** @var User $teacher */
        $teacher = Auth::user();

        DB::transaction(function() use ($request, $teacher) {
            /** @var Task $task */
            $task = $teacher->tasks()->create([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'mode' => $request->input('mode'),
                'group_id' => $request->input('group_id') ?? null,
                'user_id' => $request->input('user_id') ?? null,
            ]);

            $task->setting()->create([
                'number_range' => $request->input('number_range') ?? null,
                'timers_enabled' => $request->boolean('timers_enabled'),
                'timer_type' => $request->input('timer_type') ?? null,
                'timer_value' => $request->input('timer_value') ?? null,
                'question_count' => $request->input('question_count') ?? null,
                'show_corrected_answer' => $request->boolean('show_corrected_answer'),
                'deadline' => $request->input('deadline') ?? null,
            ]);
        });

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Тапсырма сәтті жасалды');
    }
}
