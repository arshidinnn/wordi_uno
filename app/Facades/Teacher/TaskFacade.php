<?php

namespace App\Facades\Teacher;

use App\Services\Teacher\TaskService;
use Illuminate\Support\Facades\Facade;
/**
 * @method static \Illuminate\Http\RedirectResponse store(\App\Http\Requests\Teacher\Task\StoreTaskRequest $request)
 *
 * @see TaskService
*/
class TaskFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return TaskService::class;
    }
}
