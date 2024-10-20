@extends('layouts.index')

@section('title', 'Топ құру')

@section('content')
    <h2 class="my-4">Топ құру</h2>

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Топ атауы</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}" placeholder="Топ атауын енгізіңіз">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="users-container">
            @if(old('users'))
                @foreach(old('users') as $index => $user)
                    <div class="row align-items-end mb-3 user-row">
                        <div class="col-md-5">
                            <label for="users[{{ $index }}][firstname]">Аты</label>
                            <input type="text" class="form-control @error('users.' . $index . '.firstname') is-invalid @enderror"
                                   placeholder="Атын енгізіңіз" name="users[{{ $index }}][firstname]"
                                   value="{{ old('users.' . $index . '.firstname') }}">
                            @error('users.' . $index . '.firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="users[{{ $index }}][lastname]">Тегі</label>
                            <input type="text" class="form-control @error('users.' . $index . '.lastname') is-invalid @enderror"
                                   placeholder="Тегін енгізіңіз" name="users[{{ $index }}][lastname]"
                                   value="{{ old('users.' . $index . '.lastname') }}">
                            @error('users.' . $index . '.lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-user">Жою</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row align-items-end mb-3 user-row">
                    <div class="col-md-5">
                        <label for="users[0][firstname]">Аты</label>
                        <input type="text" class="form-control" placeholder="Атын енгізіңіз"
                               name="users[0][firstname]" value="{{ old('users.0.firstname') }}">
                    </div>
                    <div class="col-md-5">
                        <label for="users[0][lastname]">Тегі</label>
                        <input type="text" class="form-control" placeholder="Тегін енгізіңіз"
                               name="users[0][lastname]" value="{{ old('users.0.lastname') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-user">Жою</button>
                    </div>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="add-user">Қолданушы қосу</button>
        </div>

        <button type="submit" class="btn btn-success">Топ құру</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let userIndex = {{ old('users') ? count(old('users')) : 1 }};

            function addUserRow() {
                const row = `
                    <div class="row align-items-end mb-3 user-row">
                        <div class="col-md-5">
                            <label for="users[${userIndex}][firstname]">Аты</label>
                            <input type="text" class="form-control" placeholder="Атын енгізіңіз" name="users[${userIndex}][firstname]">
                        </div>
                        <div class="col-md-5">
                            <label for="users[${userIndex}][lastname]">Тегі</label>
                            <input type="text" class="form-control" placeholder="Тегін енгізіңіз" name="users[${userIndex}][lastname]">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-user">Жою</button>
                        </div>
                    </div>
                `;
                document.getElementById('users-container').insertAdjacentHTML('beforeend', row);
                userIndex++;
            }

            document.getElementById('add-user').addEventListener('click', function() {
                addUserRow();
            });

            document.getElementById('users-container').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-user')) {
                    e.target.closest('.user-row').remove();
                }
            });
        });
    </script>
@endsection
