<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'category' => $this->category->name,
            'club' => $this->club->name,
            'suburb' => $this->club->suburb->name,
            'date' => Carbon::parse($this->date)->format('d/m/Y'),
            'opening' =>  Carbon::parse($this->opening)->format('g:i A'),
            'closing' =>  Carbon::parse($this->closing)->format('g:i A'),
            'picture' => $this->picture,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'ticket_link' => $this->ticket_link,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'address' => $this->club->address,
            'expanded' => false,
            'islive' => $this->islive
        ];
    }

}
