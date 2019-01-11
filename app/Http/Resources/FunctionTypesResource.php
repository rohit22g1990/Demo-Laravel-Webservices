<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionTypesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'created_by' => $this->created_by,
        ];
    }
}
