<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'password' => [
                'required',
                'min:8',
            ],
            'email' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не оставляйте это поле пустым',
            'min' => 'Пароль должен состоять минимум из 8 символов'
        ];
    }
}