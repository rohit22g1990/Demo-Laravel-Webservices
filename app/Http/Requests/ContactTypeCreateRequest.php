<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactTypeCreateRequest extends FormRequest
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
            'type' => 'required|min:2|max:100|unique:contact_types',
            'is_default' => 'in:0,1',
            'type_of' => 'in:email,phone,url,fax',
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
            "type.required" => "Contact type is required",
            "type.min" => "Contact type must have atleast 2 characters",
            "type.max" => "Contact type should not contain more than 100 characters",
            "type.unique" => "Contact type is already exists.",
            "is_default.in" => "is_default must be either 1 (for Default) or 0 (for not default)",
        ];
    }
}
