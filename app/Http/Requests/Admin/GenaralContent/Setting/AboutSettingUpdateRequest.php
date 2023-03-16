<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class AboutSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "about_heading_title" => "bail|required|string|between:3,255",
            "about_heading_description" => "bail|required|string",
            "about_first_passage_title" => "bail|required|string|between:3,255",
            "about_first_passage_description" => "bail|required|string",
            "about_second_passage_title" => "bail|required|string|between:3,255",
            "about_second_passage_description" => "bail|required|string",
            "about_home_image" => "nullable|image|max:2048",
        ];
    }
}
