@extends('layouts.auth')

@section('title', 'Кіру')

@section('content')
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Пайдаланушы аты</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                   name="username" placeholder="Пайдаланушы атыңызды енгізіңіз" value="{{ old('username') }}">

            @error('username')
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
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Кіру</button>
        </div>
    </form>
    <div class="text-center mt-2">
        <small>Аккаунтыңыз жоқ па? <a href="{{ route('auth.register') }}">Тіркелу</a></small>
    </div>
@endsection
