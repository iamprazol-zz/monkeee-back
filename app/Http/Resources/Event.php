<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'club_id' => $this->club_id,
            'category_id' => $this->category_id,
            'date' => $this->date,
            'opening' => $this->opening,
            'closing' => $this->closing,
            'picture' => $this->picture,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ];
    }

}
