@extends('layouts.index')

@section('title', __('Tasks'))

@section('content')
    <h2 class="my-4">Table with Filters and Search</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->isEmpty())
        <div class="alert alert-warning">
            {{ __('No modes found.') }}
        </div>
    @else
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mode</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->type }}</td>
                        <td>{{ $task->mode }}</td>
                        <td>
                            @if($task->group)
                                Group: {{ $task->group->name }}
                            @elseif($task->user)
                                User: {{ $task->user->firstname }} {{ $task->user->lastname }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this task?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">{{ __('Add Task') }}</a>
    </div>
@endsection
