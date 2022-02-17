<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо заполнить это поле',
            'name.string' => 'Это поле должно быть строчкой',
            'email.required' => 'Необходимо заполнить это поле',
            'email.string' => 'Это поле должно быть строчкой',
            'email.email' => 'Это поле должно быть почтой',
            'email.unique' => 'Это поле должно быть уникальным',
        ];
    }
}
