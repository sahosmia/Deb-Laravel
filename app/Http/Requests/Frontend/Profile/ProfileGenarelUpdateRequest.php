<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;



class ProfileGenarelUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {
            return [
                "name" => "bail|required|between:3,60",
                "email" => "bail|required|email",
                "image" => "nullable|image|max:2048",
            ];

    }
}
