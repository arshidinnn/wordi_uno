@extends('layouts.student')

@section('title', __('Main'))

@push('styles')
    <style>
        a.card-link {
            text-decoration: none;
            color: inherit;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
@endpush

@section('content')
    <h2 class="text-center mb-4">Қазақ әліпбиін бірге үйренейік!</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($tasks as $task)
            <div class="col">
                <a href="{{ route('student.tasks.show', ['task' => $task]) }}" class="card-link">
                    <div class="card h-100 text-center">
                        <img src="https://via.placeholder.com/150" class="card-img-top p-3" alt="{{ $task->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->name }}</h5>
                            <p class="card-text">{{ $task->type }}</p>
                            <p class="card-text">{{ $task->mode }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
