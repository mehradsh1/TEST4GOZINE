@extends('layouts.app')

@section('content')
    <textarea name="explanation" class="form-control rich-text">{{ old('explanation') }}</textarea>

    <div class="container py-5">
        <h2 class="mb-4 text-primary">لیست سوالات</h2>
        <a href="{{ route('questions.create') }}" class="btn btn-primary mb-4">افزودن سوال جدید</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>عنوان</th>
                    <th>کد</th>
                    <th>رشته</th>
                    <th>سال</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->title }}</td>
                        <td>{{ $question->question_code }}</td>
                        <td>{{ $question->major }}</td>
                        <td>{{ $question->year }}</td>
                        <td>
                            <a href="{{ route('questions.show', $question) }}" class="btn btn-info btn-sm">نمایش</a>
                            <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">ویرایش</a>
                            <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف شود؟')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
