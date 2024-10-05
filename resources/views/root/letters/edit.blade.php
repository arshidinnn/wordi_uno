@extends('layouts.index')

@section('title', __('Letters'))

@section('content')
    <h2 class="my-4">{{ __('Update word') }}</h2>
    <form method="POST" action="{{ route('letters.update', ['letter' => $letter]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Sound Input -->
        <div class="mb-3">
            <label for="soundInput" class="form-label">{{ __('Letter Sound') }}</label>
            <input type="file" name="sound" class="form-control @error('sound') is-invalid @enderror" id="soundInput">
            @error('sound')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-grid gap-2 d-md-block">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </form>

@endsection
