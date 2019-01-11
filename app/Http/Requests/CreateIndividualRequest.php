<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIndividualRequest extends FormRequest
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'initial' => 'required',
            'gender' => "required|in:male,female,other",
            'relation_type_id' => 'required|exists:relation_types,id',
            'account_manager_id' => 'required|exists:account_managers,id',
            'user_contacts' => 'json|contact_types_exists',
            'user_addresses' => 'json|address_types_exists|validate_address',
            'miscellaneous' => 'json|validate_misc_info',
            'profile_pic' => 'is_jpg',
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
            "first_name.required" => "First name is required.",
            "middle_name.required" => "Middle name is required.",
            "last_name.required" => "Last name is required.",
            "gender.required" => "Gender is required.",
            "gender.in" => "Invalid value for gender.",
            "relation_type_id.exists" => "Relation type with this id does not exists.",
            "account_manager_id.exists" => "Account manager type with this id does not exists.",
            "user_contacts.contact_types_exists" => "Contact type with this id does not exists.",
            "user_addresses.address_types_exists" => "Address type with this id does not exists.",
            "user_addresses.validate_address" => "please fill the fields Address Field 1,Post Code, City, Country in the Address.",
            'profile_pic.is_jpg' => 'Only jpg images are allowed',
            'miscellaneous.validate_misc_info' => 'something is wrong in the misc info'
        ];
    }
}
