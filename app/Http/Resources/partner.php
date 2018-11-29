<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class partner extends JsonResource
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
            'suburb_id' => $this->suburb_id,
            'suburb' => $this->suburb->name,
            'partnercategory_id' => $this->partnercategory_id,
            'partnercategory' => $this->partnercategory->name,
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'cover_photo' => $this->cover_photo,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'website' => $this->website,
            'show' => $this->show,
        ];
    }
}
