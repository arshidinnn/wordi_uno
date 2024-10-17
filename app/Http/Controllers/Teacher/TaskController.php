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
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $tasks = $user->tasks()->with(['group', 'user'])->paginate(10);
        return view('teacher.tasks.index', compact('tasks'));
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

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        return TaskService::store($request);
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return back()->with('success', 'Task deleted successfully');
    }
}
