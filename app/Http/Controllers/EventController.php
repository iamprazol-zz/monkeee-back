<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Event;
use App\Club;
use App\Category;
use App\Suburb;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Session;
use Image;

class EventController extends Controller
{

    public function index()
    {

        $today = Carbon::today();

        $events = Event::where('date', '>=', $today)->orderBy('date','asc')->get();

        $num = $events->count();

        $l = $this->liveEvent();

        $u = $this->upComing();

        $data = [
            'live' => $l,
            'upcoming' => $u,
            ];

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
            ->orderBy('date','asc')
            ->orderBy('opening', 'asc')
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

        $time = Carbon::now()->format('H:i:s');

        $nolive = Event::where('date', $today)
            ->where('opening', '>', $time)
            ->get();

        $events = Event::where('date', '>', $today)
            ->orderBy('date','asc')
            ->orderBy('opening', 'asc')
            ->get();

        $kk = $nolive->merge($events);

        $num = $kk->count();

        $data = EventResource::collection($kk);

        if ($num > 0) {

            return $this->responser($data, 200, 'All Events in upcoming weeks are listed');

        } else {

            return $this->responser($data, 404, 'Events in the upcoming weeks not found');
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

    public function show(){

        $today = Carbon::today();

        $event = Event::where('date', '>=', $today)->orderBy('date', 'asc')->orderBy('opening', 'asc')->get();

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);
    }

    public function search(Request $r){

        $today = Carbon::today();

        $id = $r->club_id;

        $event = Event::orderBy('id', 'asc')->where('club_id', $id)->where('date', '>=', $today)->orderBy('date', 'asc')->orderBy('opening', 'asc')->get();

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);

    }

    public function destroy($id){

        $event = Event::where('id', $id);

        $event->delete();

        Session::flash('success', 'Event Has Been Deleted Successfully');

        return redirect()->route('event.show');

    }

    public function create() {

        $club = Club::all();

        $category = Category::all();

        return view('event.create')->with('clubs' , $club)->with('categories', $category);

    }

    public function store(){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
            'date' => 'required|date|after:yesterday',
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/'. $filename);
        Image::make($file)->save($path);

        $event = Event::create([
            'name' => $r->name,
            'club_id' => $r->club_id,
            'category_id' => $r->category_id,
            'date' => $r->date,
            'opening' => Carbon::parse($r->opening)->format('H:i:s'),
            'closing' => Carbon::parse($r->closing)->format('H:i:s'),
            'description' => $r->description,
            'price' => $r->price,
            'ticket_link' => $r->ticket,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'picture' => $filename,

        ]);

        Session::flash('success' , 'Event added successfully');
        return redirect()->route('event.show');

    }
}



