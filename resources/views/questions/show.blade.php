@extends('layouts.app')

@section('content')
    <textarea name="explanation" class="form-control rich-text">{{ old('explanation') }}</textarea>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        {{-- عنوان سوال --}}
                        <h3 class="mb-4 text-primary"> {{ $question->title }}</h3>

                        {{-- متن سوال --}}
                        <div class="mb-4">
                            <p class="lead">{{ $question->text }}</p>
                        </div>

                        {{-- گزینه‌ها --}}
                        <form id="question-form">
                            <div class="row g-3">
                                @php
                                    $choices = [
                                        1 => $question->choice_one,
                                        2 => $question->choice_two,
                                        3 => $question->choice_three,
                                        4 => $question->choice_four,
                                    ];
                                @endphp

                                @foreach ($choices as $number => $text)
                                    <div class="col-md-6">
                                        <div class="form-check border rounded p-3 bg-light hover-effect">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="answer"
                                                value="{{ $number }}"
                                                id="choice{{ $number }}"
                                            >
                                            <label class="form-check-label" for="choice{{ $number }}">
                                                {{ $text }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>

                        {{-- نمایش پاسخ تشریحی فقط پس از انتخاب گزینه --}}
                        <div id="answer" class="alert alert-success mt-4" style="display: none;">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <strong>پاسخ صحیح: گزینه {{ $question->right_choice }}</strong><br>
                            <i class="bi bi-info-circle-fill me-2"></i>
                            توضیح: {{ $question->explanation }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .hover-effect:hover {
            background-color: #f1f5f9;
            transition: background-color 0.3s ease;
        }
        .text-primary {
            color: #007bff !important;
        }
        .card {
            border-radius: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('input[name="answer"]').forEach(function(radio) {
            radio.addEventListener('change', function () {
                document.getElementById('answer').style.display = 'block';
            });
        });
    </script>
@endpush

