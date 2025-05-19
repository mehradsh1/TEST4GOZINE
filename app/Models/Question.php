<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'choice_one',
        'choice_two',
        'choice_three',
        'choice_four',
        'right_choice',
        'answer',
        'question_code',
        'resource',
        'year',
        'major',
        'difficulty',
    ];
}
