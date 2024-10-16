<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->create([
            'firstname' => $request->string('firstname'),
            'lastname' => $request->string('lastname'),
            'email' => $request->string('email'),
            'username' => $request->string('username'),
            'password' => $request->string('password'),
            'role' => 'teacher',
        ]);

        Auth::login($user, true);

        return $this->redirectByRole($user);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['username', 'password']);

        if (!Auth::attempt($credentials, true)) {
            return back()
                ->withErrors(['username' => __('The provided credentials do not match our records.')])
                ->withInput();
        }

        $request->session()->regenerate();

        /** @var User $user */
        $user = Auth::user();

        return $this->redirectByRole($user);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

    private function redirectByRole(User $user): RedirectResponse
    {
        if ($user->role === 'root') {
            return redirect()->route('words.index');
        }

        if ($user->role === 'teacher') {
            return redirect()->route('groups.index');
        }

        return redirect()->route('students.tasks.index');

    }
}
