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
use App\Video;
use paginate;
use Illuminate\Pagination\LengthAwarePaginator;

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

        $event = Event::where('id', $id)->first();

        $num = $event->count();

        $v = $this->videoByEvent($id);

        $data = [
            'event' => $event,
            'video' => $v,
        ];

        if ($num > 0) {

            $event->count = $event->count + 1;

            $event->save();

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

        $livetomorrow = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', '>=', $tomorrow)
            ->orderBy('opening', 'asc')
            ->get();

        $liveyesterday = Event::where('opening_date', $yesterday)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $livefrommany = Event::where('opening_date', '<', $yesterday)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $liveformany = Event::where('opening_date', '<=', $yesterday)->where('closing_date', '>', $today)
            ->orderBy('opening', 'asc')
            ->get();

        $gone = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing', '<', $time)
            ->orderBy('opening', 'asc')
            ->get();


        foreach ($gone as $g) {

            $g->islive = 0;

            $g->save();

        }

        $kk = $livetoday->merge($livetomorrow)->merge($liveyesterday)->merge($livefrommany)->merge($liveformany)->sortBy('opening')->sortBy('opening_date');

        $num = count($kk);

        if ($num > 0) {

            foreach ($kk as $k) {

                $k->islive = 1;

                $k->save();

                if ($k->club->show == 1) {

                    $t[] = $k;

                }

                if (empty($t)) {
                    $l = null;
                } else {
                    $l = $t;
                }
            }
        } else {

            $l = null;

        }

        $data = EventResource::collection(collect($l));

        if (empty($l)) {
            return $this->responser($data, 404, 'Sorry no live event');
        } else {

            return $this->responser($data, 200, 'Live Events shown successfully');
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

        if ($num > 0) {

            foreach ($kk as $k) {

                $k->islive = 0;

                $k->save();

                if ($k->club->show == 1) {

                    $t[] = $k;

                }

                if (empty($t)) {
                    $l = null;
                } else {
                    $l = $t;
                }
            }
        } else {
            $l = null;
        }

        $data = EventResource::collection(collect($l));

        if ($num > 0) {

            return $this->responser($data, 200, 'All Events in upcoming weeks are listed');

        } else {

            return $this->responser($data, 404, 'Events in the upcoming weeks not found');
        }

    }

    public function liveByCategory($parameter, $id)
    {

        $live = $this->liveEvent();

        $livetojson = json_encode($live);

        $livetoarray = json_decode($livetojson);

        foreach ($livetoarray as $k => $v) {
            $liveelementtoarray[] = $v;
        }

        foreach ($liveelementtoarray[1] as $liveelement) {
            $eachelementtoarray[] = $liveelement;
        }

        $num = sizeof($eachelementtoarray[0]);

        if ($num > 0) {

            foreach ($eachelementtoarray[0] as $eachelement) {

                $checkparameter = $eachelement->$parameter;

                if ($checkparameter == $id) {

                    $filtered[] = $eachelement;

                }
                if (empty($filtered)) {
                    $filteredliveelement = null;
                } else {
                    $filteredliveelement = $filtered;
                }
            }
        } else {
            $filteredliveelement = null;
        }

        $data = collect($filteredliveelement);

        if (empty($filteredliveelement)) {

            return $this->responser($data, 404, 'Sorry no live event');

        } else {

            return $this->responser($data, 200, 'Live Events shown successfully');
        }

    }

    public function upcomingByCategory($parameter, $id)
    {


        $up = $this->upComing();

        $uptojson = json_encode($up);

        $uptoarray = json_decode($uptojson);

        foreach ($uptoarray as $k => $v) {
            $upelementtoarray[] = $v;
        }

        foreach ($upelementtoarray[1] as $upelement) {
            $eachelementtoarray[] = $upelement;
        }

        $num = sizeof($eachelementtoarray[0]);

        if ($num > 0) {

            foreach ($eachelementtoarray[0] as $eachelement) {

                $checkparameter = $eachelement->$parameter;

                if ($checkparameter == $id) {

                    $filtered[] = $eachelement;

                }
                if (empty($filtered)) {
                    $filteredupelement = null;
                } else {
                    $filteredupelement = $filtered;
                }
            }
        } else {
            $filteredupelement = null;
        }

        $data = collect($filteredupelement);

        if (empty($filteredupelement)) {

            return $this->responser($data, 404, 'Sorry no upcoming event');

        } else {

            return $this->responser($data, 200, 'Upcoming Events shown successfully');
        }

    }

    public function eventByClub($id)
    {

        $today = Carbon::today();

        $events = Event::where('club_id', $id)->where('opening_date', '>=', $today)->orderBy('opening_date', 'asc')->get();

        $num = $events->count();

        $l = $this->liveByCategory('club_id', $id);

        $u = $this->upcomingByCategory('club_id', $id);

        $data = [
            'live' => $l,
            'upcoming' => $u,
        ];

        if ($num > 0) {

            return $this->responser($data, 200, 'All Events in specified club are listed');

        } else {

            return $this->responser($data, 404, 'Events in specified club not found');
        }

    }

    public function eventByCategory($id)
    {

        $today = Carbon::today();

        $events = Event::where('category_id', $id)->where('opening_date', '>=', $today)->orderBy('opening_date', 'asc')->get();

        $num = $events->count();

        $l = $this->liveByCategory('category_id', $id);

        $u = $this->upcomingByCategory('category_id', $id);

        $data = [
            'live' => $l,
            'upcoming' => $u,
        ];

        if ($num > 0) {

            return $this->responser($data, 200, 'All Events in specified category are listed');

        } else {

            return $this->responser($data, 404, 'Events in specified category not found');
        }

    }

    public function eventBySuburb($id)
    {

        /*$today = Carbon::today();

        $club = Club::where('suburb_id', $id)->where('show', 1)->get();

        $number = $club->count();

        if ($number > 0) {

            foreach ($club as $c) {

                $events = Event::where('club_id', $c->id)->get();

                $k = $events->count();

                if ($k > 0) {

                    foreach ($events as $e) {

                        if ($e->closing_date >= $today) {

                            $kk[] = $e;

                        } else {

                            $kk = null;

                        }


                    }

                } else {

                    $kk = null;

                }
            }

                dd(sizeof(collect($kk)));

                 if (!empty($ka)) {

                     $l = $kk;

                 } else {

                     $l = 0;

                 }

             } else {

                 $l = 0;

             }*/


                 $live = $this->liveByCategory('suburb_id', $id);

                 $upcoming = $this->upcomingByCategory('suburb_id', $id);

                 $l = json_decode(json_encode($live));
                 $lcount = sizeof($l->original->data);

                 $u = json_decode(json_encode($upcoming));
                 $upcount = sizeof($u->original->data);

                 $count = $lcount + $upcount;

                 $data = [
                     'live' => $live,
                     'upcoming' => $upcoming,
                 ];


                 if ($count > 0) {

                     return $this->responser($data, 200, 'All Events in specified suburb are listed');

                 } else {

                     return $this->responser($data, 404, 'Events in specified suburb not found');

                }


    }

    public function eventBySuCat($suid, $catid ){

        $live = $this->liveByCategory('suburb_id', $suid);

        $upcoming = $this->upcomingByCategory('suburb_id', $suid);

        $livetojson = json_encode($live);

        $livetoarray = json_decode($livetojson);

        foreach ($livetoarray as $k => $v) {
            $liveelementtoarray[] = $v;
        }

        foreach ($liveelementtoarray[1] as $liveelement) {
            $eachelementtoarrayy[] = $liveelement;
        }

        $num = sizeof($eachelementtoarrayy[0]);

        if ($num > 0) {

            foreach ($eachelementtoarrayy[0] as $eachelementt) {

                $checkparameterr = $eachelementt->category_id;

                if ($checkparameterr == $catid) {

                    $filteredd[] = $eachelementt;

                }
                if (empty($filteredd)) {
                    $filteredliveelementt = null;
                } else {
                    $filteredliveelementt = $filteredd;
                }
            }
        } else {
            $filteredliveelementt = null;
        }

        $lived = collect($filteredliveelementt);

        $uptojson = json_encode($upcoming);

        $uptoarray = json_decode($uptojson);

        foreach ($uptoarray as $k => $v) {
            $upelementtoarray[] = $v;
        }

        foreach ($upelementtoarray[1] as $upelement) {
            $eachelementtoarray[] = $upelement;
        }

        $num = sizeof($eachelementtoarray[0]);

        if ($num > 0) {

            foreach ($eachelementtoarray[0] as $eachelement) {

                $checkparameter = $eachelement->category_id;

                if ($checkparameter == $catid) {

                    $filtered[] = $eachelement;

                }
                if (empty($filtered)) {
                    $filteredupelement = null;
                } else {
                    $filteredupelement = $filtered;
                }
            }
        } else {
            $filteredupelement = null;
        }

        $upcomng = collect($filteredupelement);

        $l = collect(json_decode(json_encode($lived)));

        $u = collect(json_decode(json_encode($upcomng)));


        if(!empty($l) && !empty($u)) {

            foreach ($l as $ll) {
                $liv[] = $ll;
            }

            if(!empty($liv)) {
                $lcount = sizeof($liv);
            } else {
                $lcount = 0;
            }

            foreach ($u as $uu) {
                $up[] = $uu;
            }


            if(!empty($up)) {
                $upcount = sizeof($up);
            } else {
                $upcount = 0;
            }

            $count = $lcount + $upcount;

            $data = [
                'live' => $lived,
                'upcoming' => $upcomng
            ];


            if ($count > 0) {

                return $this->responser($data, 200, 'All Events in specified suburb and category are listed');

            } else {

                return $this->responser($data, 404, 'Events in specified suburb and category not found');

            }

        } else {

            $data = [
                'live' => $lived,
                'upcoming' => $upcomng
            ];

            return $this->responser($data, 404, 'Events in specified suburb and category not found');

        }



    }


    public function videoByEvent($id){

        $video = Video::where('event_id', $id)->get();

        $l = $video->count();

        if ($l > 0) {

            return $this->responser($video, 200, 'All Vides in specified event are listed');

        } else {

            return $this->responser($video, 404, 'Videos in specified event not found');
        }

    }


    public function show()
    {

        $today = Carbon::today();

        $yesterday = Carbon::yesterday();

        $event = Event::orderBy('opening_date', 'asc')->where('opening_date', '>=', $yesterday->addDays(-2))->where('closing_date','>=', $today)->orderBy('opening', 'asc')->paginate(10);

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);
    }


    public function mostViewed()
    {

        $today = Carbon::today();

        $yesterday = Carbon::yesterday();

        $event = Event::where('opening_date', '>=', $yesterday->addDays(-2))->where('closing_date','>=', $today)->orderBy('count', 'desc')->get();

        $club = Club::all();

        $category = Category::all();

        return view('event.most')->with('events', $event)->with('clubs', $club)->with('categories', $category);
    }

    public function search(Request $r)
    {

        $today = Carbon::today();

        $yesterday = Carbon::yesterday();

        $id = $r->club_id;

        $event = Event::orderBy('id', 'asc')->where('club_id', $id)->where('opening_date', '>=', $yesterday->addDays(-2))->where('closing_date','>=', $today)->orderBy('opening_date', 'asc')->orderBy('opening', 'asc')->paginate(10);

        $club = Club::all();

        $category = Category::all();

        return view('event.show')->with('events', $event)->with('clubs', $club)->with('categories', $category);

    }

    public function destroy($id)
    {

        $event = Event::where('id', $id);

        $video = Video::where('event_id', $id);

        $event->delete();

        $video->delete();

        Session::flash('success', 'Event and its associated video Has Been Deleted Successfully');

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

    public function copy($id){

        $event = Event::where('id', $id)->first();

        $club = Club::all();

        $category = Category::all();

        return view('event.copy')->with('events', $event)->with('clubs', $club)->with('categories', $category);

    }

    public function updatecopy()
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

        Session::flash('success', 'Event copied successfully');
        return redirect()->route('event.show');

    }

    public function edit($id){

        $event = Event::where('id', $id)->first();

        $club = Club::all();

        $category = Category::all();

        return view('event.edit')->with('events', $event)->with('clubs', $club)->with('categories', $category);

    }

    public function update($id){

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
            'odate' => 'required|date',
            'cdate' => 'required|date',
            'pic' => 'required|max:15360'
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/' . $filename);
        Image::make($file)->save($path);

        $event = Event::find($id);

        $event->name = $r->name;
        $event->club_id = $r->club_id;
        $event->category_id = $r->category_id;
        $event->opening_date = $r->odate;
        $event->opening = Carbon::parse($r->opening)->format('H:i:s');
        $event->closing_date = $r->cdate;
        $event->closing = Carbon::parse($r->closing)->format('H:i:s');
        $event->description = $r->description;
        $event->price = $r->price;
        $event->ticket_link = $r->ticket;
        $event->facebook = $r->facebook;
        $event->instagram = $r->instagram;
        $event->picture = $filename;

        $event->save();

        Session::flash('success', 'Event updated successfully');

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



