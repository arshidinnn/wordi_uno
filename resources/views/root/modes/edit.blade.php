@extends('layouts.index')

@section('title', 'Режимдер')

@section('content')
    <h2 class="my-4">Режимді жаңарту</h2>
    <form method="POST" action="{{ route('modes.update', ['mode' => $mode]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="imageInput" class="form-label">Режимнің суреті</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="imageInput">
            @error('image')
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
