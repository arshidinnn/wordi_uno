@extends('layouts.index')

@section('title', 'Тапсырмалар')

@section('content')
    <h1>Тапсырма формасы</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}" id="task-form">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Тапсырма атауы</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" maxlength="255" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Бағыт</label>
            <select id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror">
                <option value="" disabled selected hidden>Пәнді таңдаңыз</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject }}" @if(old('subject') == $subject) selected @endif> {{ \App\Enums\SubjectTypes::getSubjectsWithTranslations()[$subject] }}</option>
                @endforeach
            </select>
            @error('subject')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Түрі</label>
            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                <option value="" disabled selected hidden>Түрін таңдаңыз</option>
                @foreach(\App\Enums\TaskTypes::getTaskTypesWithTranslations() as $typeValue => $typeLabel)
                    <option value="{{ $typeValue }}" @if(old('type') == $typeValue) selected @endif> {{ $typeLabel }}</option>
                @endforeach
            </select>
            @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="question_count_div" class="mb-3" style="display:none;">
            <label for="question_count" class="form-label">Сұрақтар саны</label>
            <input type="number" id="question_count" name="question_count" class="form-control @error('question_count') is-invalid @enderror" min="1" value="{{ old('question_count') }}">
            @error('question_count')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3" id="mode_div" style="display:none;">
            <label for="mode" class="form-label">Режим</label>
            <select id="mode" name="mode" class="form-control @error('mode') is-invalid @enderror">
                <option value="" disabled selected hidden>Режимді таңдаңыз</option>
                @foreach($modes as $subject => $subjectModes)
                    <optgroup label="{{ \App\Enums\SubjectTypes::getSubjectsWithTranslations()[$subject] }}" class="mode-group" data-subject="{{ $subject }}" style="display:none;">
                        @foreach($subjectModes as $mode)
                            <option value="{{ $mode }}" @if(old('mode') == $mode) selected @endif>{{ \App\Enums\ModeTypes::getModesWithTranslations()[$mode] }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            @error('mode')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="target_type" class="form-label">Кімге арналатынын таңдаңыз (Топ/Оқушы)</label>
            <select id="target_type" name="target_type" class="form-control @error('target_type') is-invalid @enderror">
                <option value="">Таңдаңыз</option>
                <option value="group" @if(old('target_type') == 'group') selected @endif>Топ</option>
                <option value="user" @if(old('target_type') == 'user') selected @endif>Қолданушы</option>
            </select>
            @error('target_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="group_id_div" class="mb-3" style="display:none;">
            <label for="group_id" class="form-label">Топ</label>
            <select id="group_id" name="group_id" class="form-control @error('group_id') is-invalid @enderror">
                <option value="" disabled selected hidden>Топты таңдаңыз</option>
                @foreach(\App\Models\Group::getAuthTeacherGroups() as $group)
                    <option value="{{ $group['id'] }}" @if(old('group_id') == $group['id']) selected @endif> {{ $group['name'] }} </option>
                @endforeach
            </select>
            @error('group_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="user_id_div" class="mb-3" style="display:none;">
            <label for="user_id" class="form-label">Қолданушы</label>
            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="" disabled selected hidden>Қолданушыны таңдаңыз</option>
                @foreach(\App\Models\User::getAuthTeacherStudents() as $student)
                    <option value="{{ $student->id }}" @if(old('user_id') == $student->id) selected @endif> {{ $student->firstname . " " . $student->lastname }} </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="number_range_div" class="mb-3" style="display:none;">
            <label for="number_range" class="form-label">Сандар диапазоны</label>
            <select id="number_range" name="number_range" class="form-control @error('number_range') is-invalid @enderror">
                <option value="" disabled selected hidden>Сандар диапазонын таңдаңыз</option>
                @foreach(\App\Enums\NumberRange::getNumberRangesWithTranslations() as $number_range_value => $number_range_label)
                    <option value="{{ $number_range_value }}" @if(old('number_range') == $number_range_value) selected @endif>{{ $number_range_label }}</option>
                @endforeach
            </select>
            @error('number_range')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="timers_enabled" value="0">
            <input type="checkbox" id="timers_enabled" name="timers_enabled" class="form-check-input @error('timers_enabled') is-invalid @enderror" value="1" {{ old('timers_enabled') ? 'checked' : '' }}>
            <label class="form-check-label" for="timers_enabled">Таймерді қосу</label>
            @error('timers_enabled')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="timer_type_div" class="mb-3" style="display:none;">
            <label for="timer_type" class="form-label">Таймер түрі</label>
            <select id="timer_type" name="timer_type" class="form-control @error('timer_type') is-invalid @enderror">
                <option value="" disabled selected hidden>Таймер түрін таңдаңыз</option>
                <option value="iteration_timer" @if(old('timer_type') == 'iteration_timer') selected @endif>Итерация таймері</option>
                <option value="overall_timer" @if(old('timer_type') == 'overall_timer') selected @endif>Жалпы таймер</option>
            </select>
            @error('timer_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="show_corrected_answer" value="0">
            <input type="checkbox" id="show_corrected_answer" name="show_corrected_answer" class="form-check-input @error('show_corrected_answer') is-invalid @enderror" value="1" {{ old('show_corrected_answer') ? 'checked' : '' }}>
            <label class="form-check-label" for="show_corrected_answer">Дұрыс жауапты көрсету</label>
            @error('show_corrected_answer')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="timer_value_div" class="mb-3" style="display:none;">
            <label for="timer_value" class="form-label">Таймер мәні (секундтарда)</label>
            <input type="number" id="timer_value" name="timer_value" class="form-control @error('timer_value') is-invalid @enderror" min="5" value="{{ old('timer_value') }}">
            @error('timer_value')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div id="deadline_div" class="mb-3" style="display:none;">
            <label for="deadline" class="form-label">Мерзімі</label>
            <input type="datetime-local" id="deadline" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}">
            @error('deadline')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Жіберу</button>
    </form>
@endsection


@push('script')
    <script>
        $(document).ready(function () {
            function updateVisibility() {
                let selectedSubject = $('#subject').val();
                let targetType = $('#target_type').val();
                let timersEnabled = $('#timers_enabled').is(':checked');
                let taskType = $('#type').val();

                if (selectedSubject === 'number') {
                    $('#number_range_div').show();
                } else {
                    $('#number_range_div').hide();
                    $('#number_range').val('');
                }

                if (targetType === 'group') {
                    $('#group_id_div').show();
                    $('#user_id_div').hide();
                } else if (targetType === 'user') {
                    $('#user_id_div').show();
                    $('#group_id_div').hide();
                }

                if (timersEnabled) {
                    if (taskType === 'learning') {
                        $('#timer_type_div').hide();
                        $('#timer_type').val('iteration_timer');
                    } else if (taskType === 'test') {
                        $('#timer_type_div').show();
                    }
                    $('#timer_value_div').show();
                } else {
                    $('#timer_type_div').hide();
                    $('#timer_value_div').hide();
                }

                if (taskType === 'test') {
                    $('#deadline_div').show();
                    $('#question_count_div').show();
                } else {
                    $('#deadline_div').hide();
                    $('#question_count_div').hide();
                }

                if (selectedSubject) {
                    $('#mode_div').show();
                    $('.mode-group').hide();
                    $('.mode-group[data-subject="' + selectedSubject + '"]').show();
                } else {
                    $('#mode_div').hide();
                }
            }

            updateVisibility();

            $('#subject').change(function() {
                $('#mode').val('');
                updateVisibility();
            });

            $('#target_type, #timers_enabled, #type').change(function() {
                let taskType = $('#type').val();

                if (taskType === 'learning') {
                    $('#timer_type').val('iteration_timer');
                } else if (taskType === 'test') {
                    $('#timer_type').val('');
                }

                updateVisibility();
            });

            $('#task-form').on('submit', function () {
                let selectedSubject = $('#subject').val();

                if (selectedSubject !== 'number') {
                    $('#number_range').val('');
                }
            });
        });
    </script>

@endpush
