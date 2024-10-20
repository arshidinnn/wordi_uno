@extends('layouts.student')

@section('title', 'Тапсырма')

@push('styles')
    <style>
        .custom-display {
            font-size: 8rem;
            font-weight: bold;
            letter-spacing: 0.9rem;
        }
    </style>
@endpush

@section('content')
    <h1 class="display-5 mb-5 fw-bold text-center">{{ $task->name }}</h1>

    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
        <h2 class="text-center custom-display">15 * 6 = ___</h2>
    </div>

    <div class="position-fixed bottom-0 end-0 p-4">
        <span class="display-1 fw-bold" id="timerDisplay">60</span>
    </div>

    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center border-0">
                <div class="modal-body">
                    <div class="p-5">
                        <img src="{{ asset('icons/correct.webp') }}" alt="Correct" class="img-fluid w-50 mb-2" id="resultIcon">
                    </div>
                    <p class="h2">Дұрыс жауап: сөз</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="finalResultModal" tabindex="-1" aria-labelledby="finalResultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center border-0">
                <div class="modal-header border-0">
                    <h2 class="modal-title w-100" id="finalResultModalLabel">Қорытынды</h2>
                </div>
                <div class="modal-body">
                    <p class="h1" id="finalResultScore">0/0</p>
                    <div class="mt-4">
                        <button class="btn btn-primary" id="startAgainBtn">Қайтадан бастау</button>
                        <button class="btn btn-secondary" id="closeBtn">Жабу</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            let correctResult = 0;
            let userInput = '';
            let underscores = '';
            const numberRange = @json($settings->number_range);
            const showCorrectedAnswer = @json($settings->show_corrected_answer);
            const timersEnabled = @json($settings->timers_enabled);
            let timerType = @json($settings->timer_type);
            const timerValue = @json($settings->timer_value);
            const mode = @json($task->mode);
            const questionCount = @json($settings->question_count);
            const taskType = @json($task->type);

            let timerInterval;
            let currentTime = timerValue;
            let currentQuestion = 0;
            let correctAnswers = 0;

            if (taskType === 'learning' && timersEnabled) {
                timerType = 'iteration_timer';
            }

            function startOverallTimer() {
                if (timersEnabled && timerType === 'overall_timer') {
                    currentTime = timerValue;
                    $('#timerDisplay').text(currentTime);
                    timerInterval = setInterval(() => {
                        currentTime--;
                        $('#timerDisplay').text(currentTime);
                        if (currentTime <= 0) {
                            clearInterval(timerInterval);
                            $('#finalResultScore').text(`${correctAnswers}/${questionCount}`);
                            $('#finalResultModal').modal('show');
                        }
                    }, 1000);
                }
            }

            function startIterationTimer() {
                if (timersEnabled && timerType === 'iteration_timer') {
                    currentTime = timerValue;
                    $('#timerDisplay').text(currentTime);
                    clearInterval(timerInterval);
                    timerInterval = setInterval(() => {
                        currentTime--;
                        $('#timerDisplay').text(currentTime);
                        if (currentTime <= 0) {
                            clearInterval(timerInterval);
                            $('#resultModal p').text('Уақыты бітті! Дұрыс жауап: ' + correctResult);
                            $('#resultIcon').attr('src', '/icons/incorrect.webp');
                            $('#resultModal').modal('show');
                            setTimeout(() => {
                                $('#resultModal').modal('hide');
                                handleNextTask();
                            }, 2000);
                        }
                    }, 1000);
                } else {
                    $('#timerDisplay').text('');
                }
            }

            function generateRandomNumber() {
                switch (numberRange) {
                    case 'single_digit':
                        return Math.floor(Math.random() * 10) + 1;
                    case 'double_digit':
                        return Math.floor(Math.random() * 90) + 10;
                    case 'triple_digit':
                        return Math.floor(Math.random() * 900) + 100;
                    default:
                        return Math.floor(Math.random() * 10) + 1;
                }
            }

            function generateTask() {
                let num1 = generateRandomNumber();
                let num2 = generateRandomNumber();

                switch (mode) {
                    case 'addition':
                        correctResult = num1 + num2;
                        $('h2.custom-display').text(`${num1} + ${num2} = ${'_'.repeat(correctResult.toString().length)}`);
                        break;
                    case 'subtraction':
                        if (num1 < num2) [num1, num2] = [num2, num1];
                        correctResult = num1 - num2;
                        $('h2.custom-display').text(`${num1} - ${num2} = ${'_'.repeat(correctResult.toString().length)}`);
                        break;
                    case 'multiplication':
                        correctResult = num1 * num2;
                        $('h2.custom-display').text(`${num1} * ${num2} = ${'_'.repeat(correctResult.toString().length)}`);
                        break;
                    case 'division':
                        if (num2 === 0) num2 = 1;
                        correctResult = num1 * num2;
                        num1 = correctResult;
                        correctResult = num1 / num2;
                        $('h2.custom-display').text(`${num1} / ${num2} = ${'_'.repeat(correctResult.toString().length)}`);
                        break;
                    default:
                        correctResult = num1 + num2;
                        $('h2.custom-display').text(`${num1} + ${num2} = ${'_'.repeat(correctResult.toString().length)}`);
                }

                underscores = '_'.repeat(correctResult.toString().length);
                userInput = '';
            }

            function handleNextTask() {
                currentQuestion++;

                if (taskType === 'test' && currentQuestion >= questionCount) {
                    $('#finalResultScore').text(`${correctAnswers}/${questionCount}`);
                    $('#finalResultModal').modal('show');
                    if (timerType !== 'overall_timer') {
                        clearInterval(timerInterval);
                    }
                } else {
                    generateTask();
                    if (timerType === 'iteration_timer') {
                        startIterationTimer();
                    }
                }
            }

            $('#startAgainBtn').on('click', function () {
                currentQuestion = 0;
                correctAnswers = 0;
                $('#finalResultModal').modal('hide');
                generateTask();
                if (timerType === 'overall_timer') {
                    startOverallTimer();
                } else {
                    startIterationTimer();
                }
            });

            $('#closeBtn').on('click', function () {
                window.location.href = "{{ route('student.tasks.index') }}";
            });

            function updateDisplay() {
                const display = userInput.padEnd(underscores.length, '_');
                $('h2.custom-display').text(function (index, text) {
                    return text.replace(/= .*/, `= ${display}`);
                });
            }

            function checkResult() {
                if (userInput.length === underscores.length) {
                    const isCorrect = parseInt(userInput) === correctResult;
                    const resultIcon = isCorrect ? 'correct.webp' : 'incorrect.webp';
                    let resultMessage = isCorrect ? 'Дұрыс жауап!' : 'Қате жауап.';

                    if (!isCorrect && showCorrectedAnswer) {
                        resultMessage += ` Дұрыс жауап: ${correctResult}`;
                    }

                    if (isCorrect) {
                        correctAnswers++;
                    }

                    $('#resultIcon').attr('src', `/icons/${resultIcon}`);
                    $('#resultModal p').text(resultMessage);
                    $('#resultModal').modal('show');
                    setTimeout(function () {
                        $('#resultModal').modal('hide');
                        handleNextTask();
                    }, 2000);

                    if (timerType !== 'overall_timer') {
                        clearInterval(timerInterval);
                    }
                }
            }

            function fetchSymbol() {
                $.get('http://localhost:8003/symbol', function (data) {
                    const symbol = data.symbol;
                    if (symbol) {
                        if (userInput.length < underscores.length) {
                            userInput += symbol;
                            updateDisplay();
                            checkResult();
                        }
                    }
                });
            }

            setInterval(fetchSymbol, 300);

            generateTask();
            if (timerType === 'overall_timer') {
                startOverallTimer();
            } else {
                startIterationTimer();
            }
        });
    </script>
@endpush
