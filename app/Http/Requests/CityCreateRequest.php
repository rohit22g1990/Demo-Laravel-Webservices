<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityCreateRequest extends FormRequest
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
            'name' => 'required|min:2|max:100|unique:cities',
            'country_id' => 'required|exists:countries,id',
        ];
    }

    /**
     * Error messages.
     *
     * @return array
     */
    public function messages() : array
    {
        return [
            "name.required" => "City name is required.",
            "name.min" => "City name must have atleast 2 characters.",
            "name.max" => "City name should not contain more than 100 characters.",
            "name.unique" => "City name is already exists.",
        ];
    }
}
