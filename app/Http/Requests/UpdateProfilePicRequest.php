<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilePicRequest extends FormRequest
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
            'profile_pic' =>'required|is_jpg',
        ];
    }

    /**
     * validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'profile_pic.required' => 'No image found',
            'profile_pic.is_jpg' => 'Only jpg images are allowed',
        ];
    }
}
