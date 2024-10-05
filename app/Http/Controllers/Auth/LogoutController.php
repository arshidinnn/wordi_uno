<?php

namespace App\Http\Controllers\Auth;

use App\Facades\AuthFacade as Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return Auth::logout();
    }
}
