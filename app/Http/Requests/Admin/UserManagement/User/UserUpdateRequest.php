<?php

namespace App\Http\Requests\Admin\UserManagement\User;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'name' => 'required|string|between:3,50',
            'email' => 'required|email|string',
            'password' => ['required', Password::min(8)->mixedCase()->symbols()->numbers()->uncompromised()],
            'role_id' => 'required',
        ];
    }
}
