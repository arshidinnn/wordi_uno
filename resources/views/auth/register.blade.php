@extends('layouts.auth')

@section('title', __('Register'))

@section('content')
    <form>
        <div class="mb-3">
            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
            <input type="text" class="form-control" id="first_name" name="firstname" placeholder="{{ __('Enter your first name') }}">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input type="text" class="form-control" id="last_name" name="lastname" placeholder="{{ __('Enter your last name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email address') }}</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter your email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter your password') }}">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm your password') }}">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <small>{{ __('Already have an account?') }} <a href="#">{{ __('Login') }}</a></small>
    </div>
@endsection
