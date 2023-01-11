<?php

namespace App\Http\Requests\Admin\GenaralContent\Team;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "name" => "bail|required|string|between:3,60",
            "image" => "bail|nullable|image|max:2048",
            "designation" => "bail|required|string|between:2,60",
            "facebook" => "bail|nullable|url",
            "linkedin" => "bail|nullable|url",
            "twitter" => "bail|nullable|url",
            "instragram" => "bail|nullable|url",
            "youtube" => "bail|nullable|url",
        ];
    }
}
