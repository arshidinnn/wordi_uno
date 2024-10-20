@extends('layouts.index')

@section('title', 'Топ туралы мәлімет')

@section('content')
    <div class="mb-3">
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Артқа</a>
    </div>

    <h2>{{ $group->name }}</h2>

    @if($group->students->isEmpty())
        <div class="alert alert-warning">
            Бұл топта студенттер табылмады.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Аты</th>
                    <th scope="col">Тегі</th>
                    <th scope="col">Пайдаланушы аты</th>
                    <th scope="col">Студент паролі</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->student_password }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
