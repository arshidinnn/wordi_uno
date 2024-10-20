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

    <h2 class="text-center mb-4">Тапсырмалар</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($tasks as $task)
            <div class="col">
                <a href="{{ route('student.tasks.show', ['task' => $task]) }}" class="card-link">
                    <div class="card h-100 text-center">
                        <div class="d-flex justify-content-center">
                            @if($task->withMode && $task->withMode->image)
                                <img src="{{ $task->withMode->image }}" class="card-img-top img-fluid w-50 p-3" alt="{{ $task->name }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top img-fluid w-50 p-3" alt="{{ $task->name }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Шығу
            </button>
        </form>
    </div>


@endsection
