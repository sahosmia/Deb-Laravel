<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class QuestionSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "question_heading_title" => "bail|required|string|between:3,255",
            "question_heading_description" => "bail|required|string",
            "question_home_image" => "nullable|image|max:2048",
        ];
    }
}
