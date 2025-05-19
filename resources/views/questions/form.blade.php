<div class="mb-3">
    <label>عنوان سوال</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $question->title ?? '') }}">
</div>

<div class="row">
    @foreach(['one', 'two', 'three', 'four'] as $i => $num)
        <div class="col-md-6 mb-3">
            <label>گزینه {{ $i+1 }}</label>
            <input type="text" name="choice_{{ $num }}" class="form-control"
                   value="{{ old('choice_'.$num, $question->{'choice_'.$num} ?? '') }}">
        </div>
    @endforeach
</div>

<div class="mb-3">
    <label>گزینه صحیح</label>
    <select name="right_choice" class="form-control">
        @foreach(['1','2','3','4'] as $num)
            <option value="{{ $num }}" @selected(old('right_choice', $question->right_choice ?? '') == $num)>
                گزینه {{ $num }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>پاسخ تشریحی</label>
    <textarea name="answer" class="form-control">{{ old('answer', $question->answer ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>کد سوال</label>
        <input type="text" name="question_code" class="form-control" value="{{ old('question_code', $question->question_code ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label>منبع</label>
        <input type="text" name="resource" class="form-control" value="{{ old('resource', $question->resource ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>سال</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $question->year ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label>رشته</label>
        <select name="major" class="form-control">
            @foreach(['tajrobi', 'math', 'ensani'] as $m)
                <option value="{{ $m }}" @selected(old('major', $question->major ?? '') == $m)>
                    {{ ucfirst($m) }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label>درجه سختی</label>
    <select name="difficulty" class="form-control">
        @foreach(['easy', 'medium', 'hard', 'veryHard'] as $diff)
            <option value="{{ $diff }}" @selected(old('difficulty', $question->difficulty ?? '') == $diff)>
                {{ ucfirst($diff) }}
            </option>
        @endforeach
    </select>
</div>


