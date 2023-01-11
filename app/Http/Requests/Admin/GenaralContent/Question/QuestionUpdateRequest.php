<?php

namespace App\Http\Requests\Admin\GenaralContent\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "title" => "bail|required|string|between:3,60",
            "answer" => "bail|required|string",
        ];
    }
}
