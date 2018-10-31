<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Event as EventResource;
class Club extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'suburb name' => $this->suburb->name,
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'cover_photo' => $this->cover_photo,
            'order' => $this->order,
            'email' => $this->email,
            'phone' => $this->phone,
            'opening_time' => $this->opening_time,
            ];
    }
}
