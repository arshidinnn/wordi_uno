@extends('layouts.index')

@section('title', 'Әріптер')

@section('content')
    <h2 class="my-4">Әріптер</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($letters->isEmpty())
        <div class="alert alert-warning">
            Ешқандай әріп табылмады.
        </div>
    @else
        <!-- Кесте -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">Әріп</th>
                    <th scope="col">Дыбыс</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @foreach($letters as $letter)
                    <tr>
                        <td>{{ $letter->value }}</td>
                        <td>
                            @if($letter->sound)
                                <audio controls>
                                    <source src="{{ $letter->sound }}" type="audio/mpeg">
                                    Сіздің браузеріңіз аудио тэгті қолдамайды.
                                </audio>
                            @else
                                Дыбыс жоқ
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('letters.edit', $letter) }}" class="btn btn-sm btn-primary">Өңдеу</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- Қосу батырмасы -->
    @if($letters->count() != 42)
        <div class="mb-4">
            <form action="{{ route('letters.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Жетіспейтін әріптерді қосу</button>
            </form>
        </div>
    @endif
@endsection
