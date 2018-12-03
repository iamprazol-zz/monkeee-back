<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class dj extends JsonResource
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
            'dj' => $this->id,
            'name' => $this->name,
            'resident' => $this->resident,
            'category' => $this->category->name,
            'label' => $this->label,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'bio' => $this->bio,
            'facebook' =>$this->facebook,
            'instagram' => $this->instagram,
            'picture' => $this->picture
        ];

    }
}
