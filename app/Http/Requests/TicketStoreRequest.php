<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends FormRequest
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
            'email' => 'required|min:3',
            'name' => 'required|min:3',
            'message' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Укажите Email',
            'email.min' => 'Email должен содержать не менее :min символа(ов)',
            'name.required' => 'Укажите имя',
            'name.min' => 'Имя должно содержать не менее :min символа(ов)',
            'message.required' => 'Вопрос не может быть пустым',
            'message.min' => 'Вопрос должен содержать не менее :min символа(ов)',
        ];
    }
}
