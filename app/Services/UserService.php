<?php

namespace App\Services;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserService
{
    public function createUserForGroup(Group $group, string $firstname, string $lastname): User
    {
        $username = generateUniqueUsername($lastname, $firstname);
        $password = Str::random(6);

        /** @var User $user */
        $user = Auth::user();
        return $group->students()->create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => bcrypt($password),
            'student_password' => $password,
            'teacher_id' => $user->id,
            'role' => 'student',
        ]);
    }
}
