<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class BannerSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {


        return [
            "banner_title" => "bail|required|string|between:3,255",
            "banner_description" => "bail|required|string",
            "banner_btn_text" => "bail|required|string|between:3,255",
            "banner_btn_link" => "bail|required|url",
            "banner_background_image" => "nullable|image|max:2048",
        ];
    }
}
