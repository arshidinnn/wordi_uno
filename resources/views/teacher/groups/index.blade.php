@extends('layouts.index')

@section('title', __('Groups'))

@section('content')
    <h2 class="my-4">Table with Filters and Search</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($groups->isEmpty())
        <div class="alert alert-warning">
            {{ __('No groups found.') }}
        </div>
    @else
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Students Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->students_count }}</td>
                        <td>
                            <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this group?') }}');" style="display:inline;">
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
            {{ $groups->links() }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('groups.create') }}" class="btn btn-success">{{ __('Add group') }}</a>
    </div>
@endsection
