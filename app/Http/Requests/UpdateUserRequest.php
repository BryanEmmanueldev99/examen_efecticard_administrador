<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.auth()->user()->id ,
            'name' => 'required|min:3|max:50',
            'password' => 'nullable|min:7|max:25',
            'password_confirmation' => 'nullable|min:7|max:25|same:password',
        ];
    }
}
