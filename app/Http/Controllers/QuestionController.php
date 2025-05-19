<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'choice_one' => 'required|string',
            'choice_two' => 'required|string',
            'choice_three' => 'required|string',
            'choice_four' => 'required|string',
            'right_choice' => 'required|in:1,2,3,4',
            'major' => 'required|string',
            'difficulty' => 'required|in:easy,medium,hard',
            'explanation' => 'nullable|string',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')->with('success', 'سوال با موفقیت ایجاد شد.');
    }
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'title' => 'required',
            'choice_one' => 'required',
            'choice_two' => 'required',
            'choice_three' => 'required',
            'choice_four' => 'required',
            'right_choice' => 'required|in:1,2,3,4',
            'answer' => 'nullable',
            'question_code' => 'nullable',
            'resource' => 'nullable',
            'year' => 'nullable|digits:4',
            'major' => 'required|in:tajrobi,math,ensani',
            'difficulty' => 'required|in:easy,medium,hard,veryHard',
        ]);

        $question->update($data);
        return redirect()->route('questions.index')->with('success', 'سوال بروزرسانی شد.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'سوال حذف شد.');
    }
}

