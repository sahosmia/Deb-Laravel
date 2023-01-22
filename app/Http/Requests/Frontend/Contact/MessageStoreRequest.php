<?php

namespace App\Http\Requests\Frontend\Contact;

use Illuminate\Foundation\Http\FormRequest;



class MessageStoreRequest extends FormRequest
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
                "message" => "bail|required|min:20",
            ];

    }
}
