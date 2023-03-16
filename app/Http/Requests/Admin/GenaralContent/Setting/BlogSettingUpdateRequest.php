<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class BlogSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "blog_heading_title" => "bail|required|string|between:3,255",
            "blog_heading_description" => "bail|required|string",
        ];
    }
}
