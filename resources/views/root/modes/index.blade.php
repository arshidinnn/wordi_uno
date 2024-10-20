@extends('layouts.index')

@section('title', '')

@section('content')
    <h2 class="my-4"> Режимдер </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($modes->isEmpty())
        <div class="alert alert-warning">
            Ешқандай режим табылмады.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">Атауы</th>
                    <th scope="col">Бағыт</th>
                    <th scope="col">Сурет</th>
                    <th scope="col">Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $modeTranslations = \App\Enums\ModeTypes::getModesWithTranslations();
                @endphp
                @foreach($modes as $mode)
                    <tr>
                        <td>{{ $modeTranslations[$mode->name] ?? $mode->name }}</td>
                        <td>{{ \App\Enums\SubjectTypes::translate($mode->subject->value)  }}</td>
                        <td>
                            @if($mode->image)
                                <img src="{{ $mode->image }}" alt="{{ $mode->name }}" style="max-width: 100px;">
                            @else
                                Сурет жоқ
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('modes.edit', $mode) }}" class="btn btn-sm btn-primary">Өңдеу</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
