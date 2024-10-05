@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">{{ __('Username') }}</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                   name="username" placeholder="{{ __('Enter your username') }}" value="{{ old('username') }}">

            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password"
                   name="password"
                   placeholder="{{ __('Enter your password') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="#">{{ __('Forgot password?') }}</a>
    </div>
    <div class="text-center mt-2">
        <small>{{ __("Don't have an account?") }} <a href="{{ route('auth.register') }}">{{ __('Sign up') }}</a></small>
    </div>
@endsection
