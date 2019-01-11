<?php
/**
 * Created by PhpStorm.
 * User: rohitghotkar
 * Date: 3/1/19
 * Time: 3:47 PM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndividualResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $profile_pic = !empty($this->profile_pic)
            ? config('constants.PIC_URLS') . $this->profile_pic
            : $this->profile_pic;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'gender' => $this->gender,
            'initial' => $this->initial,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'profile_pic' => $profile_pic,
            'created_by' => $this->created_by,
            'relation_type_id' => $this->relation_type_id,
        ];
    }

}