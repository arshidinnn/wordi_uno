@extends('layouts.index')

@section('title', 'Топтар')

@section('content')
    <h2 class="my-4">Сүзгілер мен іздеуі бар кесте</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($groups->isEmpty())
        <div class="alert alert-warning">
            Ешқандай топ табылмады.
        </div>
    @else
        <!-- Кесте -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Атауы</th>
                    <th scope="col">Оқушылар саны</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->students_count }}</td>
                        <td>
                            <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Бұл топты өшіруге сенімдісіз бе?');" style="display:inline;">
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
            {{ $groups->links() }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('groups.create') }}" class="btn btn-success">Топ қосу</a>
    </div>
@endsection
