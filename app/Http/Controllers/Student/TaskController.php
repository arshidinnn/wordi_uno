<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $this->authorize('isStudent', Auth::user());

        /** @var User $student */
        $student = Auth::user();

        $tasks = Task::getStudentTasks($student);
        return view('student.tasks.index', compact('tasks'));
    }

    public function show(Task $task): View
    {
        $settings = $task->setting()->first();
        $this->authorize('isStudent', Auth::user());
        return view('student.tasks.show', compact('task', 'settings'));
    }
}
