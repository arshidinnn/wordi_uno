@extends('layouts.auth')

@section('title', 'Тіркелу')

@section('content')
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Атыңыз</label>
            <input type="text"
                   class="form-control @error('firstname') is-invalid @enderror"
                   id="first_name"
                   name="firstname"
                   placeholder="Атыңызды енгізіңіз"
                   value="{{ old('firstname') }}">
            @error('firstname')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Тегіңіз</label>
            <input type="text"
                   class="form-control @error('lastname') is-invalid @enderror"
                   id="last_name"
                   name="lastname"
                   placeholder="Тегіңізді енгізіңіз"
                   value="{{ old('lastname') }}">
            @error('lastname')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Пайдаланушы аты</label>
            <input type="text"
                   class="form-control @error('username') is-invalid @enderror"
                   id="username"
                   name="username"
                   placeholder="Пайдаланушы атыңызды енгізіңіз"
                   value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Электрондық пошта</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   id="email"
                   name="email"
                   placeholder="Электрондық поштаңызды енгізіңіз"
                   value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Құпиясөз</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password"
                   name="password"
                   placeholder="Құпиясөзіңізді енгізіңіз">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Құпиясөзді растау</label>
            <input type="password"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation"
                   name="password_confirmation"
                   placeholder="Құпиясөзді растаңыз">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Тіркелу</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <small>Аккаунтыңыз бар ма? <a href="{{ route('auth.login') }}">Кіру</a></small>
    </div>
@endsection
