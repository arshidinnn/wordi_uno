@extends('layouts.index')

@section('title', __('Letters'))

@section('content')
    <h2 class="my-4"> {{ __('Letters') }} </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($letters->isEmpty())
        <div class="alert alert-warning">
            {{ __('No letters found.') }}
        </div>
    @else
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">{{ __('Letter') }}</th>
                    <th scope="col">{{ __('Sound') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($letters as $letter)
                    <tr>
                        <td>{{ $letter->value }}</td>
                        <td>
                            @if($letter->sound)
                                <audio controls>
                                    <source src="{{ $letter->sound }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            @else
                                {{ __('No sound') }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('letters.edit', $letter) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- Add Button -->
    @if($letters->count() != 42)
        <div class="mb-4">
            <form action="{{ route('letters.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">{{ __('Add missing letters') }}</button>
            </form>
        </div>
    @endif
@endsection
