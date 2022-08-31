<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Ответ не может быть пустым',
            'message.min' => 'Ответ должен содержать не менее :min символа(ов)'
        ];
    }
}
