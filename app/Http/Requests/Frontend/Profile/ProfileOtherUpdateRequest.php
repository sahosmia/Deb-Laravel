<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;



class ProfileOtherUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {


            return [
                "linkedin" => "nullable|url",
                "facebook" => "nullable|url",
                "drive" => "nullable|url",
            ];
    }
}
