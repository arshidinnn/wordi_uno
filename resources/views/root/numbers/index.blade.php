@extends('layouts.index')

@section('title', 'Сандар')

@section('content')
    <h2 class="my-4">Сандар</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($numbers->isEmpty())
        <div class="alert alert-warning">
            Ешқандай сан табылмады.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">Сан</th>
                    <th scope="col">Дыбыс</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @foreach($numbers as $number)
                    <tr>
                        <td>{{ $number->value }}</td>
                        <td>
                            @if($number->sound)
                                <audio controls>
                                    <source src="{{ $number->sound }}" type="audio/mpeg">
                                    Сіздің браузеріңіз аудио тэгті қолдамайды.
                                </audio>
                            @else
                                Дыбыс жоқ
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('numbers.edit', $number) }}" class="btn btn-sm btn-primary">Өңдеу</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if($numbers->count() != 42)
        <div class="mb-4">
            <form action="{{ route('numbers.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Жетіспейтін сандарды қосу</button>
            </form>
        </div>
    @endif
@endsection
