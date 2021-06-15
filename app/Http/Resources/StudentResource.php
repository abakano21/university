<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => ucwords($this->first_name),
            'last_name' => ucwords($this->last_name),
            'class' => $this->class,
            'date_of_birth' => $this->date_of_birth,
        ];
    }
}
