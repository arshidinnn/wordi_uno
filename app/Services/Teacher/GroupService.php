<?php

namespace App\Services\Teacher;

use App\Facades\UserFacade as UserService;
use App\Http\Requests\Teacher\Groups\StoreGroupRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupService
{
    public function store(StoreGroupRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            /** @var User $currentTeacher */
            $currentTeacher = Auth::user();

            /** @var Group $group */
            $group = $currentTeacher->groups()->create([
                'name' => $request->string('name')
            ]);
            $children = $request->input('users', []);

            if (!empty($children))
            {
                foreach ($children as $child)
                {
                    UserService::createUserForGroup($group, $child['firstname'], $child['lastname']);
                }
            }
        });

        return redirect()
            ->route('groups.index')
            ->with('success', 'Топ сәтті жасалды');
    }
}
