<?php

namespace App\Http\Requests\Admin\CourseManagement\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class ChapterUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [

            "title" => "bail|required|string|between:3,255",
            "position" => "bail|required",

        ];
    }
}
