<?php

namespace App\Http\Requests\Admin\UserManagement\Permission;

use Illuminate\Foundation\Http\FormRequest;



class PermissionStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'name' => 'required|string|between:6,255',
            'professional_name' => 'required|string|between:6,255',
            'module_id' => 'required',
        ];
    }




}
