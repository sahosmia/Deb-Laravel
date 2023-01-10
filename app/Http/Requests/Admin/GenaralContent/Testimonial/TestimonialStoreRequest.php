<?php

namespace App\Http\Requests\Admin\GenaralContent\Testimonial;

use Illuminate\Foundation\Http\FormRequest;



class TestimonialStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "name" => "bail|required|string|between:3,60",
            "image" => "bail|required|image|max:2048",
            "designation" => "bail|required|string|between:2,60",
            "company" => "bail|nullable|string|between:3,60",
            "feedback" => "bail|required|string",
        ];
    }




}
