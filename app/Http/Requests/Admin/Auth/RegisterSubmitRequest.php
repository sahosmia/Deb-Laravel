<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterSubmitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|between:3,50',
            'email' => 'required|email|unique:users|string',
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()],
        ];
    }
}
