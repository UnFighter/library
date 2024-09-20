<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
/*    public function authorize(): bool
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ];
    }

    public function messages(): array
    {
     return[
         'name.required' => 'Поле "Имя" обязательно для заполнения.',
         'name.string' => 'Поле "Имя" должно быть строкой.',
         'email.required' => 'Поле "Email" обязательно для заполнения.',
         'email.email' => 'Поле "Email" должно содержать действительный адрес электронной почты.',
         'email.rfc' => 'Неправильно введена почта в поле "Email"',
         'email.unique' => 'Этот адрес электронной почты уже используется.',
     ];
    }
}
