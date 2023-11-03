<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'correo_institucional' => ['required', 'email', 'unique:mysql_saga.personal_basica'],
            'celular_personal' => ['required', 'unique:mysql_saga.personal_basica'],
            'cip' => ['required', Rule::exists('mysql_saga.personal_basica', 'cip')],
        ];
    }
}
