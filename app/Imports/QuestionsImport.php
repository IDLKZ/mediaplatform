<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionsImport implements ToModel,WithStartRow,WithValidation
{
    public $quiz_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    public function model(array $row)
    {


        return new Question([
            "question"=>$row[0],
            "A"=>$row[1],
            "B"=>$row[2],
            "C"=>$row[3],
            "D"=>$row[4],
            "E"=>$row[5],
            "answer"=>trim($row[6]),
            "quiz_id"=>$this->quiz_id
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function startRow(): int
    {
        return 2;
    }



    public function rules(): array
    {
        return [
            // Can also use callback validation rules
            '0' => function($attribute, $value, $onFailure) {
                if (empty($value)) {
                    $onFailure('Вопросы должны быть полными!');
                }
            },
            '1' => function($attribute, $value, $onFailure) {
                if (empty($value) || strlen($value)>255) {
                    $onFailure('Ответы должны быть полными и не более 255 знаков!');
                }
            },
            '2' => function($attribute, $value, $onFailure) {
                if (empty($value)|| strlen($value)>255) {
                    $onFailure('Вопросы должны быть полными и не более 255 знаков!');
                }
            },
            '3' => function($attribute, $value, $onFailure) {
                if (empty($value)|| strlen($value)>255) {
                    $onFailure('Вопросы должны быть полными и не более 255 знаков!');
                }
            },
            '4' => function($attribute, $value, $onFailure) {
                if (empty($value)|| strlen($value)>255) {
                    $onFailure('Вопросы должны быть полными и не более 255 знаков!');
                }
            },
            '5' => function($attribute, $value, $onFailure) {
                if (empty($value)|| strlen($value)>255) {
                    $onFailure('Вопросы должны быть полными и не более 255 знаков!');
                }
            },
//             Can also use callback validation rules
            '6' => function($attribute, $value, $onFailure) {
                if (!in_array(trim($value), ["A","B","C","D","E"])) {
                    $onFailure('Ответы должны быть:А,B,C,D,E');
                }
            }
        ];
    }
}
