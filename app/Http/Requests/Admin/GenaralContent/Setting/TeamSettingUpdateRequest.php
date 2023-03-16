<?php

namespace App\Http\Requests\Admin\GenaralContent\Setting;

use Illuminate\Foundation\Http\FormRequest;

class TeamSettingUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "team_heading_title" => "bail|required|string|between:3,255",
            "team_heading_description" => "bail|required|string",
        ];
    }
}
