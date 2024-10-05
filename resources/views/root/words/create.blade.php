@extends('layouts.index')

@section('title', __('Add word'))

@section('content')
    <h2 class="my-4">{{ __('Add word') }}</h2>
    @include('root.words._form', ['action' => 'words.store', 'method' => 'POST'])
@endsection
