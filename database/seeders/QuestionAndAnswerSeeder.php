<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionAndAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['question' => 'What is the capital of France?'],
            ['question' => 'What is the capital of Germany?'],
            ['question' => 'What is the capital of Italy?'],
            ['question' => 'What is the capital of Spain?'],
            ['question' => 'What is the capital of Russia?'],
            ['question' => 'What is the capital of USA?'],
            ['question' => 'What is the capital of China?'],
            ['question' => 'What is the capital of Japan?'],
            ['question' => 'What is the capital of South Korea?'],
            ['question' => 'What is the capital of Brazil?'],
            ['question' => 'What is the capital of Canada?'],
            ['question' => 'What is the capital of Australia?'],
            ['question' => 'What is the capital of India?'],
            ['question' => 'What is the capital of Mexico?'],
            ['question' => 'What is the capital of Switzerland?'],
            ['question' => 'What is the capital of Pakistan?'],
            ['question' => 'What is the capital of Singapore?'],
            ['question' => 'What is the capital of Vietnam?'],
            ['question' => 'What is the capital of Egypt?'],
            ['question' => 'What is the capital of Morocco?']
        ];
        foreach ($questions as $q) {
            Question::create($q);
        }

        // Fetch the created questions to attach answers
        $insertedQuestions = Question::all();

        foreach ($insertedQuestions as $q) {
            $answers = [];
            switch ($q->question) {
                case 'What is the capital of France?':
                    $answers = [
                        ['answer_text' => 'Berlin', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Madrid', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => true],
                    ];
                    break;

                case 'What is the capital of Germany?':
                    $answers = [
                        ['answer_text' => 'Berlin', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Madrid', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;

                case 'What is the capital of Italy?':
                    $answers = [
                        ['answer_text' => 'Berlin', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Madrid', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Spain?':
                    $answers = [
                        ['answer_text' => 'Berlin', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Madrid', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Russia?':
                    $answers = [
                        ['answer_text' => 'Moscow', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Berlin', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of China?':
                    $answers = [
                        ['answer_text' => 'Shinghai', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Japan?':
                    $answers = [
                        ['answer_text' => 'Tokyo', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of South Korea?':
                    $answers = [
                        ['answer_text' => 'Seoul', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Brazil?':
                    $answers = [
                        ['answer_text' => 'Rio de Janeiro', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Canada?':
                    $answers = [
                        ['answer_text' => 'Ottawa', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of India?':
                    $answers = [
                        ['answer_text' => 'Delhi', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Mexico?':
                    $answers = [
                        ['answer_text' => 'Mexico City', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Switzerland?':
                    $answers = [
                        ['answer_text' => 'Bern', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Pakistan?':
                    $answers = [
                        ['answer_text' => 'Islamabad', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Australia?':
                    $answers = [
                        ['answer_text' => 'Sydney', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Vietnam?':
                    $answers = [
                        ['answer_text' => 'Hanoi', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Egypt?':
                    $answers = [
                        ['answer_text' => 'Cairo', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Qahira', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Morocco?':
                    $answers = [
                        ['answer_text' => 'Rabat', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Qahira', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of Singapore?':
                    $answers = [
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Qahira', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Singapore', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                case 'What is the capital of USA?':
                    $answers = [
                        ['answer_text' => 'Rome', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'New York', 'question_id' => $q->id, 'is_correct' => true],
                        ['answer_text' => 'Beijing', 'question_id' => $q->id, 'is_correct' => false],
                        ['answer_text' => 'Paris', 'question_id' => $q->id, 'is_correct' => false],
                    ];
                    break;
                default:
                    break;
            }
            foreach ($answers as $a) {
                Answer::create($a);
            }
        }
    }
}
