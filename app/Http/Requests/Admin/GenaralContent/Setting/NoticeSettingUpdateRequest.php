<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class NoticeSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "notice_heading_title" => "bail|required|string|between:3,255",
            "notice_heading_description" => "bail|required|string",
        ];
    }
}
