<form method="POST" action="{{ route($action, $method === 'PUT' ? ['word' => $word] : []) }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <!-- Value Input -->
    <div class="mb-3">
        <label for="valueInput" class="form-label">{{ __('Word Value') }}</label>
        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="valueInput" placeholder="{{ __('Enter word value') }}" value="{{ old('value', $word->value ?? '') }}">
        @error('value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Sound Input -->
    <div class="mb-3">
        <label for="soundInput" class="form-label">{{ __('Word Sound') }}</label>
        <input type="file" name="sound" class="form-control @error('sound') is-invalid @enderror" id="soundInput">
        @error('sound')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Image Input -->
    <div class="mb-3">
        <label for="imageInput" class="form-label">{{ __('Word Image') }}</label>
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
