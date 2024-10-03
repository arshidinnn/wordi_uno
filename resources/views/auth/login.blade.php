@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter your email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="{{ __('Enter your password') }}">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="#">{{ __('Forgot password?') }}</a>
    </div>
    <div class="text-center mt-2">
        <small>{{ __("Don't have an account?") }} <a href="#">{{ __('Sign up') }}</a></small>
    </div>
@endsection
