<?php

namespace App\Http\Requests\Admin\GenaralContent\WhyChoose;

use Illuminate\Foundation\Http\FormRequest;



class WhyChooseStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "title" => "bail|required|string|min:3",
            "description" => "bail|required|string|min:3",
            "icon" => "bail|required|string|min:3",
        ];
    }




}
