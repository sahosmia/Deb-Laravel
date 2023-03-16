<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class ContactSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "phone" => "bail|required|string|between:9,20",
            "whatsapp" => "bail|nullable|string|between:9,20",
            "email" => "bail|required|email|min:5",
            "facebook" => "bail|required|url|between:3,255",
            "facebook_group" => "bail|required|url|between:3,255",
            "linkedin" => "bail|required|url|between:3,255",
            "youtube" => "bail|nullable|url|between:3,255",
            "messanger_code" => "bail|required",
        ];
    }
}
