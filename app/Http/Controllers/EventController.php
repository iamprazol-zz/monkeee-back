<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Event;
use App\Club;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{

    public function index()
    {

        $today = Carbon::today();

        $events = Event::where('date', '>=', $today)->get();

        $num = $events->count();

        $data = EventResource::collection($events);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Events  are listed');

        } else {

            return $this->responser($data,404,'Events not found');
        }

    }

    public function weeklyEvent()
    {

        $today = Carbon::today();

        $week = date('Y-m-d', strtotime($today . ' + 7 days'));

        $events = Event::whereBetween('date', [$today, $week])->orderBy('date', 'asc')
            ->orderBy('opening', 'asc')
            ->get();

        $num = $events->count();

        $data = EventResource::collection($events);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Events in this week are listed');

        } else {

            return $this->responser($data,404,'Events in this week not found');
        }
    }


    public function showById($id)
    {

        $event = Event::where('id', $id)->get();

        $num = $event->count();

        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data , 200 , 'The event with specific id is shown');

        } else {

            return $this->responser($data,404,'The event with specific id is no found');
        }
    }


    public function liveEvent()
    {

        $time = Carbon::now()->format('H:i:s');

        $today = Carbon::today();

        $live = Event::where('date', $today)->where('opening', '<', $time)
            ->where('closing', '>', $time)
            ->get();

        $num = $live->count();

        $data = EventResource::collection($live);

        if ($num > 0) {

            return $this->responser($data , 200 , 'Live Events shown successfully');

        } else {

            return $this->responser($data,404,'Sorry no live event');
        }
    }


    public function upComing()
    {

        $today = Carbon::today();

        $week = date('Y-m-d', strtotime($today . ' + 7 days'));

        $events = Event::where('date', '>', $week)->get();

        $num = $events->count();

        $data = EventResource::collection($events);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Events in upcoming weeks are listed');

        } else {

            return $this->responser($data,404,'Events in the upcoming weeks not found');
        }
    }


    public function showByClub($id)
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


    public function showByCategory($id)
    {

        $today = Carbon::today();

        $event = Event::where('category_id', $id)->where('date', '>=', $today)
            ->get();

        $num = $event->count();

        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Event in specified category are listed');

        } else {

            return $this->responser($data,404,'Events in the specified category not found');
        }
    }
}



