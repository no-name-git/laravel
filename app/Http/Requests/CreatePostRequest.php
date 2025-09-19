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
            'user_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок',
            'title.min' => 'Минимальное число символов 3',
            'deskr.required' => 'Введите заголовок',
            'deskr.min' => 'Минимальное число символов 1',
            'image.image' => 'Файл должен быть .jpeg, .png, .jpg, .gif',
            'image.max' => 'Файл должен весить не больше 5MB'
        ];
    }
}
