<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('choice_one');
            $table->string('choice_two');
            $table->string('choice_three');
            $table->string('choice_four');
            $table->enum('right_choice', ['1', '2', '3', '4']);
            $table->text('answer')->nullable();
            $table->string('question_code')->nullable();
            $table->string('resource')->nullable();
            $table->year('year')->nullable();
            $table->enum('major', ['tajrobi', 'math', 'ensani']);
            $table->enum('difficulty', ['easy', 'medium', 'hard', 'veryHard']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
