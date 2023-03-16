<?php

namespace App\Http\Requests\Admin\CourseManagement\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'bail|required|string|between:3,255',
            'slug' => 'bail|nullable|string|between:3,255|unique:courses,slug',
            'description' => 'bail|required|string|min:10',
            'will_learn' => 'bail|required|string|min:10',
            'requirement' => 'bail|required|string|min:10',
            'skill_level' => 'bail|required',
            'instructor_id' => 'bail|required',
            'price' => 'bail|required',
            'image' => 'bail|required|image',
        ];
    }
}
