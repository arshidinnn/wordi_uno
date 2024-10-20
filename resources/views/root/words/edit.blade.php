@extends('layouts.index')

@section('title', 'Сөзді жаңарту')

@section('content')
    <h2 class="my-4">Сөзді жаңарту</h2>
    @include('root.words._form', ['action' => 'words.update', 'method' => 'PUT', 'word' => $word])
@endsection
