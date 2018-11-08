<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubGallery;
use Illuminate\Http\Request;
use App\Suburb;
use App\Club;
use App\Club_gallery;
use App\Event;
use Illuminate\Support\Facades\Session;

class SuburbController extends Controller
{

    public function index(Request $r){

        $suburb = Suburb::orderBy('id', 'asc')->where('name' ,'like' , '%'.$r->get('suburb').'%')->get();

        return view('suburb.index')->with('suburbs', $suburb);
    }

    public function create() {

        return view('suburb.create');

    }

    public function store(){
        $r = request();
        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
            'postal' => 'required|integer|digits:4',
        ]);

        $req = Suburb::create([
            'name' => $r->name,
            'postalcode' => $r->postal,
        ]);

        Session::flash('success' , 'Suburb added successfully');
        return redirect()->route('suburb.index');

    }


    public function destroy($id){

        $suburb = Suburb::where('id', $id);

        $club = Club::where('suburb_id', $id);

        $clubs = Club::where('suburb_id', $id)->get();

        $suburb->delete();

        $club->delete();

        foreach ($clubs as $c){

            $event = Event::where('club_id', $c->id);

            $gallery = Club_gallery::where('club_id', $c->id);

            $event->delete();

            $gallery->delete();

        }

        Session::flash('success', 'Suburb and its associated clubs, events and gallery has been deleted successfully');

        return redirect()->route('club.show');

    }
}
?>
