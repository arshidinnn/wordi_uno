@extends('layouts.index')

@section('title', 'Сөз қосу')

@section('content')
    <h2 class="my-4">Сөз қосу</h2>
    @include('root.words._form', ['action' => 'words.store', 'method' => 'POST'])
@endsection
