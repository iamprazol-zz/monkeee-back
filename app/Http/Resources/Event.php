<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Video;

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
            'category_id' => $this->category_id,
            'club' => $this->club->name,
            'club_id' => $this->club_id,
            'suburb' => $this->club->suburb->name,
            'suburb_id' => $this->club->suburb->id,
            'postal_code' => $this->club->suburb->postalcode,
            'date' => Carbon::parse($this->opening_date)->format('d/m/Y'),
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
            'islive' => $this->islive,
            'video' => $this->video(),
        ];
    }

    public function video(){

        $event = Event::where('id', $this->id)->first();

        if($event->islive == 1) {

            $video = Video::where('event_id', $this->id)->first();

            if (!empty($video)){

                return $video->video;

            } else {

                return null;

            }

        } else {

            return null;

        }

    }

}
