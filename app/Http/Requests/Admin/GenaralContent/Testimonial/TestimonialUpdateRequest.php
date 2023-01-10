<?php

namespace App\Http\Requests\Admin\GenaralContent\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "name" => "bail|required|string|between:3,60",
            "image" => "nullable|required|image",
            "designation" => "bail|required|string|between:2,60",
            "company" => "nullable|string|between:3,60",
            "feedback" => "bail|required|string",
        ];
    }
}
