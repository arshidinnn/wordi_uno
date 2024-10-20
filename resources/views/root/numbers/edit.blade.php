@extends('layouts.index')

@section('title', 'Сандар')

@section('content')
    <h2 class="my-4">Санды жаңарту</h2>
    <form method="POST" action="{{ route('numbers.update', ['number' => $number]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="soundInput" class="form-label">Санның дыбысы</label>
            <input type="file" name="sound" class="form-control @error('sound') is-invalid @enderror" id="soundInput">
            @error('sound')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-grid gap-2 d-md-block">
            <button type="submit" class="btn btn-primary">Жіберу</button>
        </div>
    </form>

@endsection
