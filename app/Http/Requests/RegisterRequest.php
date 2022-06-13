<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'names' => ['required', 'string'],
            'lastnames' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'confirmed']
        ];
    }

    public function message(): array {
        return [
            'names.required' => "Los nombres son obligatorios",
            'lastnames.required' => "Los apellidos son obligatorios",
            'username.required' => "El nombre de usuario es obligatorio",
            'username.unique' => "El nombre de usuario ya esta en uso",
            'email.required' => "El correo electrónico es obligatorio",
            'email.unique' => "El correo electrónico ya esta en uso",
            'password.required' => "La contraseña es obligatoria",
            'password.confirmed' => "Las contraseñas no coinciden"
        ];
    }
}
