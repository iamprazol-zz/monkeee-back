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

        $events = Event::where('opening_date', '>=', $today)->orderBy('opening_date', 'asc')->get();

        $num = $events->count();

        $l = $this->liveEvent();

        $u = $this->upComing();

        $data = [
            'live' => $l,
            'upcoming' => $u,
        ];

        if ($num > 0) {

            return $this->responser($data, 200, 'All Events are listed');

        } else {

            return $this->responser($data, 404, 'Events not found');
        }


    }


    public function showById($id)
    {

        $event = Event::where('id', $id)->get();

        $num = $event->count();

        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data, 200, 'The event with specific id is shown');

        } else {

            return $this->responser($data, 404, 'The event with specific id is no found');
        }
    }


    public function liveEvent()
    {

        $time = Carbon::now()->format('H:i:s');

        $today = Carbon::today();

        $yesterday = Carbon::yesterday();

        $tomorrow = Carbon::tomorrow();

        $livetoday = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $livetomorrow = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $tomorrow)->where('closing', '<', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $liveyesterday = Event::where('opening_date', $yesterday)->where('opening', '>', $time)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();


        /*$livec = Event::where('date', $today)->where('opening', '<', $time)->where('closing', '<', $this->closing('closing'))
            ->orderBy('opening', 'asc')
            ->get();*/

        $gone = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing' ,'<', $time)
            ->orderBy('opening', 'asc')
            ->get();

        foreach ($gone as $g){

            $g->islive = 0;

            $g->save();

        }

        $kk = $livetoday->merge($livetomorrow)->merge($liveyesterday)->sortBy('opening')->sortBy('opening_date');

        foreach ($kk as $k){

            $k->islive = 1;

            $k ->save();

        }

        $num = $kk->count();

        $data = EventResource::collection($kk);

        if ($num > 0) {

            return $this->responser($data, 200, 'Live Events shown successfully');

        } else {

            return $this->responser($data, 404, 'Sorry no live event');
        }
    }


    public function upComing()
    {

        $today = Carbon::today();

        $time = Carbon::now()->format('H:i:s');

        $nolive = Event::where('opening_date', $today)
            ->where('opening', '>', $time)
            ->get();

        $events = Event::where('opening_date', '>', $today)
            ->orderBy('opening_date', 'asc')
            ->orderBy('opening', 'asc')
            ->get();

        $kk = $nolive->merge($events)->sortby('opening')->sortby('opening_date');

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

        $event = Event::where('club_id', $id)->where('opening_date', '>=', $today)
            ->get();

        $num = $event->count();


        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data, 200, 'All Event in specified club are listed');

        } else {

            return $this->responser($data, 404, 'Events in the specified club is not found');
        }
    }


    public function showByCategory($id)
    {

        $today = Carbon::today();

        $time = Carbon::now()->format('H:i:s');

        $yesterday = Carbon::yesterday();

        $tomorrow = Carbon::tomorrow();

        $livetoday = Event::where('category_id', $id)->where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $livetomorrow = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $tomorrow)->where('closing', '<', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $liveyesterday = Event::where('category_id', $id)->where('opening_date', $yesterday)->where('opening', '>', $time)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $gone = Event::where('category_id', $id)->where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing' ,'<', $time)
            ->orderBy('opening', 'asc')
            ->get();

        foreach ($gone as $g){

            $g->islive = 0;

            $g->save();

        }

        $kk = $livetoday->merge($livetomorrow)->merge($liveyesterday)->sortBy('opening')->sortBy('opening_date');

        foreach ($ll as $k) {

            $k->islive = 1;

            $k->save();

        }

        $num = $ll->count();

        $nolive = Event::where('category_id', $id)->where('opening_date', $today)
            ->where('opening', '>', $time)
            ->get();

        $events = Event::where('category_id', $id)->where('opening_date', '>', $today)
            ->orderBy('opening_date', 'asc')
            ->orderBy('opening', 'asc')
            ->get();

        $kk = $nolive->merge($events)->sortBy('opening');


        $data = [
            'live' => $ll,
            'upcoming' => $kk,
        ];

        if ($num > 0) {

            return $this->responser($data, 200, 'All Event in specified category are listed');

        } else {

            return $this->responser($data, 404, 'Events in the specified category not found');
        }
    }

    public function show()
    {

        $today = Carbon::today();

        $event = Event::orderBy('opening_date', 'asc')->where('opening_date', '>=', $today)->orderBy('opening', 'asc')->get();

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);
    }

    public function search(Request $r)
    {

        $today = Carbon::today();

        $id = $r->club_id;

        $event = Event::orderBy('id', 'asc')->where('club_id', $id)->where('opening_date', '>=', $today)->orderBy('opening_date', 'asc')->orderBy('opening', 'asc')->get();

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);

    }

    public function destroy($id)
    {

        $event = Event::where('id', $id);

        $event->delete();

        Session::flash('success', 'Event Has Been Deleted Successfully');

        return redirect()->route('event.show');

    }

    public function create()
    {

        $club = Club::all();

        $category = Category::all();

        return view('event.create')->with('clubs', $club)->with('categories', $category);

    }

    public function store()
    {

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
            'odate' => 'required|date|after:yesterday',
            'cdate' => 'required|date|after:yesterday',
            'pic' => 'required|max:15360'
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/' . $filename);
        Image::make($file)->save($path);

        $event = Event::create([
            'name' => $r->name,
            'club_id' => $r->club_id,
            'category_id' => $r->category_id,
            'opening_date' => $r->odate,
            'opening' => Carbon::parse($r->opening)->format('H:i:s'),
            'closing_date' => $r->cdate,
            'closing' => Carbon::parse($r->closing)->format('H:i:s'),
            'description' => $r->description,
            'price' => $r->price,
            'ticket_link' => $r->ticket,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'picture' => $filename,

        ]);

        Session::flash('success', 'Event added successfully');
        return redirect()->route('event.show');

    }

    /*public function closing($c)
    {

        $time = Carbon::now()->format('H:i:s');

        $today = Carbon::today();

        $live = Event::where('date', $today)->where('opening', '<', $time)->get();

        $n = $live->count();

        if ($n > 0) {
            foreach ($live as $l) {

                $c = $l->closing;

                if ($c > $time) {

                    return $c;

                } else {

                    $k = Carbon::parse($c)->addHours($c)->format('H:i:s');

                    return $k;
                }
            }
        } else {
            return false;
        }
    }*/
}



