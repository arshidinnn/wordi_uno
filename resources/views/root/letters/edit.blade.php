@extends('layouts.index')

@section('title', 'Әріптер')

@section('content')
    <h2 class="my-4">Сөзді жаңарту</h2>
    <form method="POST" action="{{ route('letters.update', ['letter' => $letter]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="soundInput" class="form-label">Әріптің дыбысы</label>
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
