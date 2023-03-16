<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "testimonial_heading_title" => "bail|required|string|between:3,255",
            "testimonial_heading_description" => "bail|required|string",
        ];
    }
}
