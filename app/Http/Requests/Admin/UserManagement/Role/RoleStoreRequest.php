<?php

namespace App\Http\Requests\Admin\UserManagement\Role;

use Illuminate\Foundation\Http\FormRequest;



class RoleStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
        ];
    }




}
