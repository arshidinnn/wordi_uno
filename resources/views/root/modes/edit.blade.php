@extends('layouts.index')

@section('title', __('Modes'))

@section('content')
    <h2 class="my-4">{{ __('Update mode') }}</h2>
    <form method="POST" action="{{ route('modes.update', ['mode' => $mode]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Image Input -->
        <div class="mb-3">
            <label for="imageInput" class="form-label">{{ __('Mode Image') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="imageInput">
            @error('image')
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
