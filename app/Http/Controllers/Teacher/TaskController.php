<?php

namespace App\Http\Controllers\Teacher;

use App\Enums\ModeTypes;
use App\Facades\Teacher\TaskFacade as TaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Teacher\Task\StoreTaskRequest;
use App\Http\Requests\Teacher\Task\UpdateTaskRequest;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(): View
    {

        return view('teacher.tasks.index');
    }


    public function create(): View
    {
        $subjects = \App\Enums\SubjectTypes::getSubjects();
        $modes = [];

        foreach ($subjects as $subject) {
            $modes[$subject] = ModeTypes::getModes($subject);
        }

        return view('teacher.tasks.create', compact('subjects', 'modes'));
    }

    public function store(StoreTaskRequest $request)
    {
        return TaskService::store($request);
    }

    public function edit(Task $task)
    {}

    public function update(UpdateTaskRequest $request, Task $task)
    {}
}
