<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
            'user_id' =>'required|exists:users,id',
            'hobbi' =>'nullable|string|min:3|max:500',
            'city' =>'nullable|string|min:3|max:130',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:5120'
        ];
    }
}
