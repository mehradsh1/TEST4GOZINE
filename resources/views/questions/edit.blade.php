@extends('layouts.app')

@section('content')
    <textarea name="explanation" class="form-control rich-text">{{ old('explanation') }}</textarea>

    <div class="container">
        <h2>ویرایش سوال</h2>

        <form action="{{ route('questions.update', $question) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>متن سوال</label>
                <textarea name="text" class="form-control" required>{{ $question->text }}</textarea>
            </div>

            @for($i = 1; $i <= 4; $i++)
                <div class="mb-3">
                    <label>گزینه {{ $i }}</label>
                    <input name="option{{ $i }}" class="form-control" value="{{ $question->{'option'.$i} }}" required>
                </div>
            @endfor

            <div class="mb-3">
                <label>گزینه صحیح</label>
                <input type="number" name="correct_option" class="form-control" value="{{ $question->correct_option }}" min="1" max="4" required>
            </div>

            <div class="mb-3">
                <label>توضیح تشریحی</label>
                <textarea name="explanation" class="form-control">{{ $question->explanation }}</textarea>
            </div>

            <div class="mb-3">
                <label>نام سازنده</label>
                <input name="creator_name" class="form-control" value="{{ $question->creator_name }}">
            </div>

            <button class="btn btn-primary">ثبت تغییرات</button>
        </form>
    </div>
@endsection

