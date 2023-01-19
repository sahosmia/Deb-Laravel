<?php

namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ProfilePasswordUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }



    public function rules()
    {
            return [
                'current_password' => ["required", "min:4"],
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->symbols()->numbers()->uncompromised()],
            ];
    }
}
