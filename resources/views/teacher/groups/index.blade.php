@extends('layouts.index')

@section('title', __('Groups'))

@section('content')
    <div class="mb-3">
        <a href="{{ route('groups.create') }}" class="btn btn-success">{{ __('Add group') }}</a>
    </div>
@endsection
