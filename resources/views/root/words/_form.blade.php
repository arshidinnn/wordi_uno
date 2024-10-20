<form method="POST" action="{{ route($action, $method === 'PUT' ? ['word' => $word] : []) }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="valueInput" class="form-label">{{ __('Сөздің мәні') }}</label>
        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="valueInput" placeholder="{{ __('Сөздің мәнін енгізіңіз') }}" value="{{ old('value', $word->value ?? '') }}">
        @error('value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="soundInput" class="form-label">{{ __('Сөздің дыбысы') }}</label>
        <input type="file" name="sound" class="form-control @error('sound') is-invalid @enderror" id="soundInput">
        @error('sound')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="imageInput" class="form-label">{{ __('Сөздің суреті') }}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="imageInput">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="d-grid gap-2 d-md-block">
        <button type="submit" class="btn btn-primary">{{ __('Жіберу') }}</button>
    </div>
</form>
