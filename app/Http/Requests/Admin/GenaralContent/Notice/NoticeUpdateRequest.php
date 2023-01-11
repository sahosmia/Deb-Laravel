<?php

namespace App\Http\Requests\Admin\GenaralContent\Notice;

use Illuminate\Foundation\Http\FormRequest;

class NoticeUpdateRequest extends FormRequest
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
        ];
    }
}
