<?php
namespace App\Providers;

use App\Exceptions\ValidationException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend("address_types_exists", function($attribute, $value, $parameters) {
            $data = json_decode($value, true);
            //If invalid json format
            if ($data == NULL) {
                return true;
            }

            return $this->validateIds($data, 'address_type_id', 'address_types');
        });

        Validator::extend("validate_address", function($attribute, $value, $parameters) {
            $data = json_decode($value, true);
            //If invalid json format
            if ($data == NULL) {
                return true;
            }

            return $this->validateAddress($data);
        });

        Validator::extend("contact_types_exists", function($attribute, $value, $parameters) {
            $data = json_decode($value, true);
            //If invalid json format
            if ($data == NULL) {
                return true;
            }

            return $this->validateIds($data, 'contact_type_id', 'contact_types');
        });

        /**
         * Validate profile image
         */

        Validator::extend('is_jpg',function($attribute, $value, $params, $validator) {

            if (gettype($value) == "string") {
                //base64 image
                $img = explode(',', $value);
                $imageType = explode(';', substr($img[0], 11))[0];
            } else {
                //if image file object
                $imageType = $value->getClientOriginalExtension();
            }

            return $imageType == 'jpg' || $imageType == 'jpeg';
        });

        Validator::replacer('validate_misc_info', function ($message, $attribute, $rule, $parameters) {

            return str_replace(':validate_misc_info', 'SUCCESS', $message);
        });

        Validator::extend('validate_misc_info',function($attribute, $value, $params, $validator) {

            $data = json_decode($value, true);
            $rules = [
                "dob" => "required|date",
                "birth_place" => "required|min:2|max:50",
                "birth_name" => "required|min:2|max:50",
                "nationality" => "min:2|max:50",
                "marital_status" => "in:Married,single,divorced,other",
                "id_type" => "in:Identity Card,Passport,Drivers Licence,Residence Document",
                "salutation_id" => "exists:salutation,id",
                "function_type_id" => "exists:function_types,id",
                "website" => "url",
                "inactive" => "in:0,1",
                "no_mailing" => "in:0,1",
                "entry_date" => "date|nullable",
                "id_expiry_date" => "date|nullable",
                "bic_code" => "max:20",
                "v_number" => "max:10",
            ];

            $messages= [
                "dob.required" => "Date Required",
            ];

            $validator = $data ? Validator::make($data, $rules, $messages) : false;

            //throw new ValidationException($validator->Errors()->all());

            if ($validator && $validator->fails()) {
                return false;
            }

            return true;
        },'failed validation');



    }

    /**
     * Validate ids from json data
     *
     * @param $data
     * @param $parameterName
     * @param $tableName
     * @return bool
     */
    public function validateIds($data, $parameterName, $tableName)
    {
        //get all ids from json
        $typeIds = array_pluck($data, $parameterName);
        $rules = [
            'id' => "exists:$tableName,id",
        ];
        foreach ($typeIds as $typeId) {
            $data = ['id' => $typeId];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $individualAddresses
     * @return mixed
     */
    public function validateAddress($individualAddresses)
    {
        $rules = [
            'address_field1' =>'required',
            'city' => 'required',
            'country' => 'required',
            'post_code' => 'required',
        ];
        foreach ($individualAddresses as $individualAddress) {
            $data = [
                'address_field1' => $individualAddress['address_field1'] ?? null,
                'city' => $individualAddress['city'] ?? null,
                'country' => $individualAddress['country'] ?? null,
                'post_code' => $individualAddress['post_code'] ?? null,
            ];

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return false;
            }
        }

        return true;
    }

}
