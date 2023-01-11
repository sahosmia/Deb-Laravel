<?php

namespace App\Http\Requests\Admin\GenaralContent\Gallery;

use Illuminate\Foundation\Http\FormRequest;



class GalleryStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            "title" => "bail|required|string|between:3,60",
            "image" => "bail|required|image|max:2048",
        ];
    }




}
