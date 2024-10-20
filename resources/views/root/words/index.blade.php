@extends('layouts.index')

@section('title', 'Сөздер')

@section('content')
    <h2 class="my-4">Сөздер</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($words->isEmpty())
        <div class="alert alert-warning">
            Ешқандай сөз табылмады.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Сөз</th>
                    <th scope="col">Санат</th>
                    <th scope="col">Дыбыс</th>
                    <th scope="col">Сурет</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @foreach($words as $word)
                    <tr>
                        <th scope="row">{{ $word->id }}</th>
                        <td>{{ $word->value }}</td>
                        <td>{{ $word->category->name ?? 'Санат жоқ' }}</td>
                        <td>
                            @if($word->sound)
                                <audio controls>
                                    <source src="{{ $word->sound }}" type="audio/mpeg">
                                    Сіздің браузеріңіз аудио тэгті қолдамайды.
                                </audio>
                            @else
                                Дыбыс жоқ
                            @endif
                        </td>
                        <td>
                            @if($word->image)
                                <img src="{{ $word->image }}" alt="{{ $word->value }}" style="width: 50px; height: auto;">
                            @else
                                Сурет жоқ
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('words.edit', $word) }}" class="btn btn-sm btn-primary">Өңдеу</a>
                            <form action="{{ route('words.destroy', $word->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Бұл сөзді өшіруге сенімдісіз бе?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Жою</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-3">
        <a href="{{ route('words.create') }}" class="btn btn-success">Жаңа сөз қосу</a>
    </div>
@endsection
