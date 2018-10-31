<?php

namespace App\Http\Controllers;

use App\Http\Resources\Event as EventResource;
use Illuminate\Http\Request;
use App\Club;
use App\Suburb;
use App\Event;
use Carbon\Carbon;
use App\Http\Resources\Club as ClubResource;
use phpDocumentor\Reflection\Types\This;

class ClubController extends Controller
{
    public function index(){

        $clubs = Club::where('show', 1)->paginate(15);

        $num = $clubs->count();

        $data = ClubResource::collection($clubs);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All clubs are listed');

        } else {

            return $this->responser($data,404,'Clubs not found');
        }

    }

    public function showById($id){

        $club = Club::where('id' , $id)
            ->where('show' , 1)
            ->get();

        $num = $club->count();

        $c = ClubResource::collection($club);

        $e = $this->eventByClub($id);

        $data = [
            ['club' => $c ,
                'events' => $e
            ]
        ];

        if ($num > 0) {

            return $this->responser($data , 200 , 'Club with specific id is found');

        } else {

            return $this->responser($c,404,'Club with specific id is not found');
        }
    }



    public function showBySuburb($id){

        $clubs = Club::where('suburb_id' , $id)
                    ->where('show' , 1)
                    ->get();

        $num = $clubs->count();

        $data = ClubResource::collection($clubs);

        if ($num > 0) {

            return $this->responser($data , 200 , 'Club in specific suburb is found');

        } else {

            return $this->responser($data,404,'Club in specific suburb is not found');
        }
    }

    public function eventByClub($id)
    {

        $today = Carbon::today();

        $event = Event::where('club_id', $id)->where('date', '>=', $today)
            ->get();

        $num = $event->count();


        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Event in specified club are listed');

        } else {

            return $this->responser($data,404,'Events in the specified club is not found');
        }
    }
}
