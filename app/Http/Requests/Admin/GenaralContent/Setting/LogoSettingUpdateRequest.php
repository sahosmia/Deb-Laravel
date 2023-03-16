<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class LogoSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "logo" => "bail|required|image|max:2048",
        ];
    }
}
