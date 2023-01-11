<?php

namespace App\Http\Requests\Admin\GenaralContent\Counter;

use Illuminate\Foundation\Http\FormRequest;



class CounterStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "title" => "bail|required|string|between:3,60",
            "number" => "bail|required|numeric|min:2",
        ];
    }




}
