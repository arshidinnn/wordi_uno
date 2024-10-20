@extends('layouts.index')

@section('title', 'Тапсырмалар')

@section('content')
    <h2 class="my-4">Сүзгілер мен іздеуі бар кесте</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->isEmpty())
        <div class="alert alert-warning">
            Ешқандай режим табылмады.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Атауы</th>
                    <th scope="col">Түрі</th>
                    <th scope="col">Режимі</th>
                    <th scope="col">Тағайындалған</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ App\Enums\TaskTypes::translate($task->type->value) }}</td>
                        <td>{{ App\Enums\ModeTypes::translate($task->mode) }}</td>
                        <td>
                            @if($task->group)
                                Топ: {{ $task->group->name }}
                            @elseif($task->user)
                                Оқушы: {{ $task->user->firstname }} {{ $task->user->lastname }}
                            @else
                                Қол жетімді емес
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Бұл тапсырманы өшіруге сенімдісіз бе?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Тапсырма қосу</a>
    </div>
@endsection
