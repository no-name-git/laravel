<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'text_comment' => 'required|string|min:1|max:500',
            'image_comment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ];
    }

    
    public function messages()
    {
        return [
            'text_comment.required' => 'Введите заголовок',
            'text_comment.min' => 'Минимальное число символов 3',
            'image_comment.image' => 'Файл должен быть .jpeg, .png, .jpg, .gif',
            'image_comment.max' => 'Файл должен весить не больше 5MB'
        ];
    }
}
