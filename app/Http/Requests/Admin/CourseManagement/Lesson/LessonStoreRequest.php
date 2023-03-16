<?php

namespace App\Http\Requests\Admin\CourseManagement\Lesson;

use Illuminate\Foundation\Http\FormRequest;



class LessonStoreRequest extends FormRequest
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
            "file_name" => "bail|required",
            "file_type" => "bail|required",
        ];
    }




}
