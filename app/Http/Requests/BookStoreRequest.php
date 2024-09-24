<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description'=>'string|max:8000',
            'amount' => 'required|integer',
            'authors' => 'required|array',
        ];
    }
    public function messages(): array
    {
        return [
          'title.required' => 'Поле "Название" должно быть заполнено',
            'title.string' => 'Поле "Название" должно быть строкой.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
            'amount.required' => 'Поле "Количество" обязательно для заполнения.',
            'amount.integer' => 'Поле "Количество" должно быть целым числом.',
            'authors.required' => 'Поле "Авторы" обязательно для заполнения.',
            'authors.array' => 'Поле "Авторы" должно быть массивом.',
        ];
    }
}
