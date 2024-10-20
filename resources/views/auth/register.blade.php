@extends('layouts.auth')

@section('title', 'Тіркелу')

@section('content')
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Атыңыз</label>
            <input type="text" class="form-control" id="first_name" name="firstname" placeholder="Атыңызды енгізіңіз">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Тегіңіз</label>
            <input type="text" class="form-control" id="last_name" name="lastname" placeholder="Тегіңізді енгізіңіз">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Пайдаланушы аты</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Пайдаланушы атыңызды енгізіңіз">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Электрондық пошта</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Электрондық поштаңызды енгізіңіз">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Құпиясөз</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Құпиясөзіңізді енгізіңіз">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Құпиясөзді растау</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Құпиясөзді растаңыз">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Тіркелу</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <small>Аккаунтыңыз бар ма? <a href="{{ route('auth.login') }}">Кіру</a></small>
    </div>
@endsection
