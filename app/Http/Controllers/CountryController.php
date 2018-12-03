<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\city;
use App\partner;
use App\Suburb;
use App\Club;
use App\Event;
use App\Club_gallery;
use App\Video;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{

    public function show(Request $r){

        $country = country::orderBy('name', 'asc')->where('name' ,'like' , '%'.$r->get('country').'%')->get();

        return view('nation.country.show')->with('countries', $country);

    }

    public function create(){

        return view('nation.country.create');

    }

    public function store(){

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
        ]);

        $country = country::create([
            'name' => $r->name
        ]);


        Session::flash('success' , 'Country added successfully');
        return redirect()->route('country.show');

    }

    public function edit($id){

        $country = country::where('id', $id)->first();

        return view('nation.country.edit')->with('countries', $country);

    }


    public function update($id){
        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
        ]);

        $country = country::find($id);
        $country->name = $r->name;

        $country->save();

        Session::flash('success' , 'Country updated successfully');
        return redirect()->route('country.show');

    }

    public function destroy($id){

        $country = country::where('id', $id);

        $country->delete();

        $city = city::where('country_id', $id);

        $cities = city::where('country_id', $id)->get();

        $city->delete();

        foreach ($cities as $c) {

            $suburb = Suburb::where('city_id', $c->id);

            $suburbs = Suburb::where('city_id', $c->id)->get();

            $suburb->delete();

            foreach ($suburbs as $s) {

                $club = Club::where('suburb_id', $s->id);

                $partner = partner::where('suburb_id', $s->id);

                $clubs = Club::where('suburb_id', $s->id)->get();

                $club->delete();

                $partner->delete();

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
        }

        Session::flash('success', 'Country and its associated city, suburbs, partners, clubs, events and gallery has been deleted successfully');

        return redirect()->route('country.show');

    }

}
