@extends('layouts.index')

@section('title', __('Create group'))

@section('content')
    <h2 class="my-4">{{ __('Create group') }}</h2>

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">{{ __('Group Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter group name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="users-container">
            @if(old('users'))
                @foreach(old('users') as $index => $user)
                    <div class="row align-items-end mb-3 user-row">
                        <div class="col-md-5">
                            <label for="users[{{ $index }}][firstname]">{{ __('First Name') }}</label>
                            <input type="text" class="form-control @error('users.' . $index . '.firstname') is-invalid @enderror"
                                   placeholder="{{ __('Enter First Name') }}" name="users[{{ $index }}][firstname]"
                                   value="{{ old('users.' . $index . '.firstname') }}">
                            @error('users.' . $index . '.firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="users[{{ $index }}][lastname]">{{ __('Last Name') }}</label>
                            <input type="text" class="form-control @error('users.' . $index . '.lastname') is-invalid @enderror"
                                   placeholder="{{ __('Enter Last Name') }}" name="users[{{ $index }}][lastname]"
                                   value="{{ old('users.' . $index . '.lastname') }}">
                            @error('users.' . $index . '.lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-user">{{ __('Remove') }}</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row align-items-end mb-3 user-row">
                    <div class="col-md-5">
                        <label for="users[0][firstname]">{{ __('First Name') }}</label>
                        <input type="text" class="form-control" placeholder="{{ __('Enter First Name') }}"
                               name="users[0][firstname]" value="{{ old('users.0.firstname') }}">
                    </div>
                    <div class="col-md-5">
                        <label for="users[0][lastname]">{{ __('Last Name') }}</label>
                        <input type="text" class="form-control" placeholder="{{ __('Enter First Name') }}"
                               name="users[0][lastname]" value="{{ old('users.0.lastname') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-user">{{ __('Remove') }}</button>
                    </div>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="add-user">{{ __('Add User') }}</button>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Create Group') }}</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let userIndex = {{ old('users') ? count(old('users')) : 1 }};

            function addUserRow() {
                const row = `
                    <div class="row align-items-end mb-3 user-row">
                        <div class="col-md-5">
                            <label for="users[${userIndex}][firstname]">{{ __('First Name') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Enter First Name') }}" name="users[${userIndex}][firstname]">
                        </div>
                        <div class="col-md-5">
                            <label for="users[${userIndex}][lastname]">{{ __('Last Name') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Enter First Name') }}" name="users[${userIndex}][lastname]">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-user">{{ __('Remove') }}</button>
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
