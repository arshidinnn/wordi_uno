@extends('layouts.index')

@section('title', __('Add word'))

@section('content')
    <h2 class="my-4">{{ __('Update word') }}</h2>
    @include('root.words._form', ['action' => 'words.update', 'method' => 'PUT', 'word' => $word])
@endsection
