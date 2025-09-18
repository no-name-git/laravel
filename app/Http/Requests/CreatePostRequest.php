<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|min:3|max:40',
            'deskr' => 'required|min:1|max:500',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок',
            'title.min' => 'Минимальное число символов 3',
            'deskr.required' => 'Введите заголовок',
            'deskr.min' => 'Минимальное число символов 1',
            
        ];
    }
}
