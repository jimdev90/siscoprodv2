<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                return [
                    'id' => ['required', Rule::exists('roles','id')],
                    'name' => ['required', Rule::unique('roles')->ignore($this->name, 'name')],
                    'description' => 'required',
                    'permissions' => "required"
                ];
            case 'POST':
                return [
                    'name' => ['required', 'unique:roles'],
                    'description' => 'required',
                    'permissions' => "required"
                ];

            default:
                return [];
        }
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'description' => 'descripción',
            'permissions' => "permisos"
        ];
    }
}
