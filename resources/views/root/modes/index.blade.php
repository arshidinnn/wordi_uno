@extends('layouts.index')

@section('title', __(''))

@section('content')
    <h2 class="my-4"> {{ __('Modes') }} </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($modes->isEmpty())
        <div class="alert alert-warning">
            {{ __('No modes found.') }}
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Subject') }}</th>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($modes as $mode)
                    <tr>
                        <td>{{ $mode->name }}</td>
                        <td>{{ $mode->subject }}</td>
                        <td>
                            @if($mode->image)
                                <img src="{{ $mode->image }}" alt="{{ $mode->name }}" style="max-width: 100px;">
                            @else
                                {{ __('No image') }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('modes.edit', $mode) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
