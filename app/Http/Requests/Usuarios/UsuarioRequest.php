<?php 

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class UsuarioRequest extends FormRequest
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
            'email' => 'required|unique:users|email',
            'name' => 'required|min:3|max:50',
            'password' => 'required|min:7|max:25',
            'password_confirmation' => 'required|min:7|max:25|same:password',
        ];
    }
}

