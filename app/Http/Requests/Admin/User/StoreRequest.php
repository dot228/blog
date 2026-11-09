<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=> 'Це поле необхідно заповнити',
            'name.string'=> "Ім'я має бути строкою",
            'email.required'=> 'Це поле необхідно заповнити',
            'email.string'=> "Почта має бути строкою",
            'email.email'=> "Ваша почта має відповідати формату gmail@some.domain",
            'email.unique'=> "Користувач з такою почтою вже існує",
        ];
    }
}
