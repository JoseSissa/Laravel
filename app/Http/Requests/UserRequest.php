<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser una cadena',
            'name.max' => 'El nombre debe tener menos de 255 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.string' => 'El email debe ser una cadena',
            'email.email' => 'El email debe ser válido',
            'email.max' => 'El email debe tener menos de 255 caracteres',
            'email.unique' => 'El email ya existe',
            'password.required' => 'La contraseña es obligatoria',
            'password.string' => 'La contraseña debe ser una cadena',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }
}
