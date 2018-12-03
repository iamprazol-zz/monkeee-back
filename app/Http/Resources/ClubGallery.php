<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Club_gallery;

class ClubGallery extends JsonResource
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
            'picture' => $this->gallery()
        ];

    }

    public function gallery(){

        $gallery = Club_gallery::where('club_id', $this->club_id)->get();

        foreach ($gallery as $gal){

            return explode(",",$gal->picture);

        }

    }
}
