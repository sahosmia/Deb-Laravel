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
        if(auth()->user()->role->name == "Student" ){

            return [
                "linkedin" => "bail|required|url",
                "facebook" => "bail|required|url",
                "drive" => "bail|required|url",
                "whatsapp" => "bail|required",
                "phone" => "bail|required",
                "date_of_birth" => "bail|required",
            ];
        }
        else{

            return [
                "linkedin" => "nullable|url",
                "facebook" => "nullable|url",
                "drive" => "nullable|url",
            ];
        }
    }
}
