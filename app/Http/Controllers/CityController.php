<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city;
use App\zone;
use App\country;
use App\Suburb;
use App\Club;
use App\Event;
use App\Club_gallery;
use App\partner;
use App\Video;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{

    public function show(){

        $city = city::orderBy('name', 'asc')->get();

        $zone = zone::all();

        $country = country::all();

        return view('nation.city.show')->with('cities', $city)->with('zones', $zone)->with('countries', $country);

    }

    public function search(Request $r){

        $id = $r->country_id;

        $city = city::orderBy('name', 'asc')->where('country_id', $id)->where('name' ,'like' , '%'.$r->get('city').'%')->get();

        $country = country::all();

        return view('nation.city.show')->with('cities', $city)->with('countries', $country);

    }

    public function create(){

        $country = country::all();

        $zone = zone::orderBy('name', 'asc')->get();

        return view('nation.city.create')->with('zones', $zone)->with('countries', $country);

    }

    public function store(){

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
        ]);

        city::create([
            'country_id' => $r->country_id,
            'zone_id' => $r->timezone_id,
            'name' => $r->name
        ]);


        Session::flash('success' , 'City added successfully');
        return redirect()->route('city.show');

    }

    public function edit($id){

        $city = city::where('id', $id)->first();

        $country = country::all();

        $zone = zone::all();

        return view('nation.city.edit')->with('cities', $city)->with('zones', $zone)->with('countries', $country);

    }


    public function update($id){
        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
        ]);

        $city = city::find($id);
        $city->country_id = $r->country_id;
        $city->zone_id = $r->timezone_id;
        $city->name = $r->name;

        $city->save();

        Session::flash('success' , 'City updated successfully');
        return redirect()->route('city.show');

    }

    public function destroy($id){

        $city = city::where('id', $id);

        $suburb = Suburb::where('city_id', $id);

        $suburbs = Suburb::where('city_id', $id)->get();

        $city->delete();

        $suburb->delete();

        foreach ($suburbs as $s){

            $partner = partner::where('suburb_id', $s->id);

            $club = Club::where('suburb_id', $s->id);

            $clubs = Club::where('suburb_id', $s->id)->get();

            $partner->delete();

            $club->delete();

            foreach ($clubs as $c) {

                $event = Event::where('club_id', $c->id);

                $events = Event::where('club_id', $c->id)->get();

                $gallery = Club_gallery::where('club_id', $c->id);

                $event->delete();

                $gallery->delete();

                foreach ($events as $e){

                    $video = Video::where('event_id', $e->id);

                    $video->delete();

                }
            }

        }

        Session::flash('success', 'City and its associated suburbs,clubs, events and gallery has been deleted successfully');

        return redirect()->route('city.show');

    }

}
