<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'role.required' => 'Role is required',
            'password.min' => 'minimum password is 8 characters',
        ];
    }
}
