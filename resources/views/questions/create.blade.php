@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h2 class="mb-4">ایجاد سوال جدید</h2>

        {{-- نمایش خطاها --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf

            {{-- عنوان سوال --}}
            <div class="mb-3">
                <label for="title" class="form-label">عنوان سوال</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            {{-- متن سوال --}}
            <div class="mb-3">
                <label for="text" class="form-label">متن سوال</label>
                <textarea name="text" id="text" class="form-control" rows="3" required>{{ old('text') }}</textarea>
            </div>

            {{-- گزینه‌ها --}}
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">گزینه ۱</label>
                    <input type="text" name="choice_one" class="form-control" value="{{ old('choice_one') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">گزینه ۲</label>
                    <input type="text" name="choice_two" class="form-control" value="{{ old('choice_two') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">گزینه ۳</label>
                    <input type="text" name="choice_three" class="form-control" value="{{ old('choice_three') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">گزینه ۴</label>
                    <input type="text" name="choice_four" class="form-control" value="{{ old('choice_four') }}" required>
                </div>
            </div>

            {{-- گزینه صحیح --}}
            <div class="mt-4 mb-3">
                <label for="right_choice" class="form-label">شماره گزینه صحیح</label>
                <select name="right_choice" id="right_choice" class="form-select" required>
                    <option value="">انتخاب کنید</option>
                    <option value="1" {{ old('right_choice') == 1 ? 'selected' : '' }}>۱</option>
                    <option value="2" {{ old('right_choice') == 2 ? 'selected' : '' }}>۲</option>
                    <option value="3" {{ old('right_choice') == 3 ? 'selected' : '' }}>۳</option>
                    <option value="4" {{ old('right_choice') == 4 ? 'selected' : '' }}>۴</option>
                </select>
            </div>

            {{-- رشته --}}
            <div class="mb-3">
                <label for="major" class="form-label">رشته</label>
                <select name="major" id="major" class="form-select" required>
                    <option value="">انتخاب کنید</option>
                    <option value="tajrobi" {{ old('major', $question->major ?? '') == 'تجربی' ? 'selected' : '' }}>تجربی</option>
                    <option value="math" {{ old('major', $question->major ?? '') == 'ریاضی' ? 'selected' : '' }}>ریاضی</option>
                    <option value="ensani" {{ old('major', $question->major ?? '') == 'انسانی' ? 'selected' : '' }}>انسانی</option>
                </select>
            </div>

            {{-- سختی سوال --}}
            <div class="mb-3">
                <label for="difficulty" class="form-label">درجه سختی</label>
                <select name="difficulty" id="difficulty" class="form-select" required>
                    <option value="">انتخاب کنید</option>
                    <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>آسان</option>
                    <option value="medium" {{ old('difficulty') == 'medium' ? 'selected' : '' }}>متوسط</option>
                    <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>سخت</option>
                </select>
            </div>

            {{-- توضیح تشریحی --}}
            <div class="mb-3">
                <label for="explanation" class="form-label">توضیح تشریحی</label>
                <textarea name="explanation" id="explanation" class="form-control" rows="3">{{ old('explanation') }}</textarea>
            </div>

            {{-- ارسال --}}
            <button type="submit" class="btn btn-success mt-3">ثبت سوال</button>
        </form>
    </div>
@endsection




