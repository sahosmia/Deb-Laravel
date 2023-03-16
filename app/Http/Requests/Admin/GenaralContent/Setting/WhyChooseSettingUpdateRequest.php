<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class WhyChooseSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "why_choose_heading_title" => "bail|required|string|between:3,255",
            "why_choose_heading_description" => "bail|required|string",
            "why_choose_home_image" => "nullable|image|max:2048",
        ];
    }
}
