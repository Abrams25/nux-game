<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'regex:/^\+?[0-9\s\-\(\)]{10,20}$/'
            ],
        ];
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->input('username');
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->input('phone');
    }
}
