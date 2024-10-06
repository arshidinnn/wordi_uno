@extends('layouts.index')

@section('title', __('Numbers'))

@section('content')
    <h2 class="my-4"> {{ __('Numbers') }} </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($numbers->isEmpty())
        <div class="alert alert-warning">
            {{ __('No numbers found.') }}
        </div>
    @else
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">{{ __('Number') }}</th>
                    <th scope="col">{{ __('Sound') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($numbers as $number)
                    <tr>
                        <td>{{ $number->value }}</td>
                        <td>
                            @if($number->sound)
                                <audio controls>
                                    <source src="{{ $number->sound }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            @else
                                {{ __('No sound') }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('numbers.edit', $number) }}"
                               class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- Add Button -->
    @if($numbers->count() != 42)
        <div class="mb-4">
            <form action="{{ route('numbers.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">{{ __('Add missing numbers') }}</button>
            </form>
        </div>
    @endif
@endsection
