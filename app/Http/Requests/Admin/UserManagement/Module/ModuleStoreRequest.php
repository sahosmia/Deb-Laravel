<?php

namespace App\Http\Requests\Admin\UserManagement\Module;

use Illuminate\Foundation\Http\FormRequest;



class ModuleStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'title' => 'required|unique:modules,title',
        ];
    }




}
