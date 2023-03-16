<?php

namespace App\Http\Requests\Admin\UserManagement\Module;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ModuleUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'title' => 'required|unique:modules,title,' . $this->id,
        ];
    }
}
