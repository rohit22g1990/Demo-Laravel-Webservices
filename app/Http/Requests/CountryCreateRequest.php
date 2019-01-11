<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryCreateRequest extends FormRequest
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
            'name' => 'required|min:2|max:100|unique:countries',
        ];
    }

    /**
     * custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => "Country name is required.",
            "name.min" => "Country name must have atleast 2 characters.",
            "name.max" => "Country name should not contain more than 100 characters.",
            "name.unique" => "Country name is already exists.",
        ];
    }
}
