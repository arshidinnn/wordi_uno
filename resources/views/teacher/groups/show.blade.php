@extends('layouts.index')

@section('title', __('Group Details'))

@section('content')
    <div class="mb-3">
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>

    <h2>{{ $group->name }}</h2>

    @if($group->students->isEmpty())
        <div class="alert alert-warning">
            {{ __('No students found in this group.') }}
        </div>
    @else
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
