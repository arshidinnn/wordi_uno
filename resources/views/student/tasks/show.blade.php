@extends('layouts.student')

@section('title', 'Task')

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
        <span class="display-1 fw-bold">60</span>
    </div>

    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center border-0">
                <div class="modal-body">
                    <div class="p-5">
                        <img src=" {{ asset('icons/correct.webp') }} " alt="Correct" class="img-fluid w-50 mb-2" id="resultIcon">
                    </div>
                    <p class="h2">Правильный ответ: слово</p>
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

            function generateTask() {
                const num1 = Math.floor(Math.random() * 100);
                const num2 = Math.floor(Math.random() * 100);
                correctResult = num1 + num2;
                const resultLength = correctResult.toString().length;
                underscores = '_'.repeat(resultLength);
                userInput = '';
                $('h2.custom-display').text(`${num1} + ${num2} = ${underscores}`);
            }

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
                    const resultMessage = isCorrect ? 'Правильный ответ!' : `Правильный ответ: ${correctResult}`;
                    $('#resultIcon').attr('src', `/icons/${resultIcon}`);
                    $('#resultModal p').text(resultMessage);
                    $('#resultModal').modal('show');
                    setTimeout(function () {
                        $('#resultModal').modal('hide');
                        generateTask();
                    }, 2000);
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
        });
    </script>
@endpush
