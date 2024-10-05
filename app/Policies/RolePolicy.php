<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function isRoot(User $user): bool
    {
        return $user->role === 'root';
    }

    public function isTeacher(User $user): bool
    {
        return $user->role === 'teacher';
    }

    public function isChild(User $user): bool
    {
        return $user->role === 'child';
    }
}
