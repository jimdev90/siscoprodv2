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
            'correo_institucional' => ['required', 'email', Rule::unique('mysql_saga.personal_basica')->ignore($this->correo_institucional, 'correo_institucional')],
            'celular_personal' => ['required', Rule::unique('mysql_saga.personal_basica')->ignore($this->celular_personal, 'celular_personal')],
            'cip' => ['required', 'numeric', 'digits_between:6,8', Rule::exists('mysql_saga.personal_basica', 'cip')],
            'unidad' => ['required'],
            'nombre_completo' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'correo_institucional' => 'correo institucional',
            'celular_personal' => 'número de celular',
            'cip' => 'número de CIP',
            'unidad' => 'nombre de la unidad',
            'nombre_completo' => 'nombre completo',
        ];
    }
}
