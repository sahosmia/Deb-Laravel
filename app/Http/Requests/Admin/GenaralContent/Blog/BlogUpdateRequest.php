<?php

namespace App\Http\Requests\Admin\GenaralContent\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [

            "title" => "bail|required|string|between:3,255",
            "image" => "nullable|image|max:2048",
            "short_description" => "bail|required|string",
            "description" => "bail|nullable|string",
        ];
    }
}
