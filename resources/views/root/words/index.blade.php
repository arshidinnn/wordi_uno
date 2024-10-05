@extends('layouts.index')

@section('title', __('Words'))

@section('content')
    <h2 class="my-4"> {{ __('Words') }} </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($words->isEmpty())
        <div class="alert alert-warning">
            {{ __('No words found.') }}
        </div>
    @else

    <!-- Filters and Search form -->
        <form class="row g-3 mb-4">
            <!-- Select Option -->
            <div class="col-md-4">
                <label for="filterSelect" class="form-label">Filter by Category</label>
                <select class="form-select" id="filterSelect">
                    <option selected>Choose category</option>
                    <!-- Предполагается, что категории динамические -->
                    <!-- Дополнительно можно их передавать из контроллера -->
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                </select>
            </div>

            <!-- Search Box -->
            <div class="col-md-6">
                <label for="searchInput" class="form-label">Search</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Enter search query">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
        </form>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Word') }}</th>
                    <th scope="col">{{ __('Category') }}</th>
                    <th scope="col">{{ __('Sound') }}</th>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($words as $word)
                    <tr>
                        <th scope="row">{{ $word->id }}</th>
                        <td>{{ $word->value }}</td>
                        <td>{{ $word->category->name ?? __('No category') }}</td>
                        <td>
                            @if($word->sound)
                                <audio controls>
                                    <source src="{{ $word->sound }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            @else
                                {{ __('No sound') }}
                            @endif
                        </td>
                        <td>
                            @if($word->image)
                                <img src="{{ $word->image }}" alt="{{ $word->value }}" style="width: 50px; height: auto;">
                            @else
                                {{ __('No image') }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('words.edit', $word) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                            <form action="{{ route('words.destroy', $word->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('{{ __('Are you sure you want to delete this word?') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- Add Button -->
    <div class="mt-3">
        <a href="{{ route('words.create') }}" class="btn btn-success">{{ __('Add New Word') }}</a>
    </div>
@endsection
