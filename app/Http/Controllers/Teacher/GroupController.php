<?php

namespace App\Http\Controllers\Teacher;

use App\Facades\Teacher\GroupFacade as GroupService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Groups\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(): View
    {
        $groups = Group::withCount('students')->paginate(10);

        return view('teacher.groups.index', compact('groups'));
    }

    public function create(): View
    {
        return view('teacher.groups.create');
    }

    public function store(StoreGroupRequest $request): RedirectResponse
    {
        return GroupService::store($request);
    }
    public function show(Group $group): View
    {
        $group->load('students');

        return view('teacher.groups.show', compact('group'));
    }
    public function edit(Group $group): View
    {
        return view('teacher.groups.edit', compact('group'));
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(Group $group): RedirectResponse
    {
        $group->delete();
        return back()->with('success', 'Group deleted successfully');
    }
}
