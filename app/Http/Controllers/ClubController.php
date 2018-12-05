<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Club;
use App\Suburb;
use App\Event;
use App\Club_gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\Club as ClubResource;
use App\Http\Resources\Event as EventResource;
use App\Http\Resources\ClubGallery as ClubGalleryResource;
use phpDocumentor\Reflection\Types\This;
use Intervention\Image\Facades\Image;


class ClubController extends Controller
{
    public function index(){

        $clubs = Club::where('show', 1)->orderBy('name', 'asc')->paginate(10);

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
            ->orderBy('name', 'asc')
            ->get();

        $num = $club->count();

        $c = ClubResource::collection($club);

        $e = $this->eventByClub($id);

        $g = $this->galleryByClub($id);

        $data =
            ['club' => $c ,
                'events' => $e ,
                'gallery' => $g
        ];

        if ($num > 0) {

            foreach ($club as $c){

                $c->count = $c->count + 1;

                $c->save();
            }

            return $this->responser($data , 200 , 'Club with specific id is found');

        } else {

            return $this->responser($c,404,'Club with specific id is not found');
        }
    }



    public function showBySuburb($id){

        $clubs = Club::where('suburb_id' , $id)
                    ->where('show' , 1)
                    ->orderBy('name', 'asc')
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

        $event = Event::where('club_id', $id)->where('opening_date', '>=', $today)
            ->orderBy('name', 'asc')
            ->get();

        $num = $event->count();

        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Event in specified club are listed');

        } else {

            return $this->responser($data,404,'Events in the specified club is not found');
        }
    }

    public function galleryByClub($id){

        $gallery = Club_gallery::where('club_id' , $id)
            ->get();

        $num = $gallery->count();

        $data = ClubGalleryResource::collection($gallery);
        if ($num > 0) {

            return $this->responser($data , 200 , 'All pictures clubs are listed');

        } else {

            return $this->responser($data,404,'Pictures of the Club not found');
        }
    }

    public function show(){

        $club = Club::orderBy('name','ASC')->paginate(10);

        $suburb = Suburb::all();

        return view('club.show')->with('clubs', $club)->with('suburbs', $suburb);
    }

    public function mostViewed(){

        $club = Club::orderBy('count','desc')->get();

        $suburb = Suburb::all();

        return view('club.most')->with('clubs', $club)->with('suburbs', $suburb);
    }

    public function search(Request $r){

        $id = $r->suburb_id;

        $club = Club::orderBy('name', 'asc')->where('suburb_id', $id)->where('name' ,'like' , '%'.$r->get('club').'%')->get();

        $suburb = Suburb::all();


        return view('club.show')->with('clubs', $club)->with('suburbs', $suburb);

    }

    public function create() {

        $suburb = Suburb::all();

        return view('club.create')->with('suburbs' , $suburb);

    }

    public function store(){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'order' => 'required|unique:clubs',
            'pic' => 'required|max:15360'
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('images/' . $filename));

        $club = Club::create([
            'suburb_id' => $r->suburb_id,
            'name' => $r->name,
            'address' => $r->address,
            'description' => $r->description,
            'order' => $r->order,
            'phone' => $r->phone,
            'email' => $r->email,
            'open' => $r->days,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'cover_photo' => $filename,
        ]);

        Session::flash('success' , 'Club added successfully');
        return redirect()->route('club.show');

    }

    public function shown($id){

        $ad = Club::where('id' , $id)->first();

        $ad->show = 1 ;

        $ad->save();

        Session::flash('success' , 'The club is set to shown successfully');

        return redirect()->back();

    }

    public function unshown($id){

        $ad = Club::where('id' , $id)->first();

        $ad->show = 0 ;

        $ad->save();

        Session::flash('success' , 'The club is set to unshown successfully');

        return redirect()->back();

    }

    public function destroy($id){

        $club = Club::where('id', $id);

        $event = Event::where('club_id', $id);

        $events = Event::where('club_id', $id)->get();

        $gallery = Club_gallery::where('club_id', $id);

        $club->delete();

        $event->delete();

        $gallery->delete();

        foreach ($events as $e){

            $video = Video::where('event_id', $e->id);

            $video->delete();

        }

        Session::flash('success', 'Club and its associated events, videos and gallery has been deleted successfully');

        return redirect()->route('club.show');

    }

    public function edit($id){

        $club = Club::where('id', $id)->first();

        $suburb = Suburb::all();

        return view('club.edit')->with('clubs', $club)->with('suburbs', $suburb);

    }

    public function update($id){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'order' => 'required|unique:clubs,order,'.$id.'club_id',
            'pic' => 'required|max:15360'
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('images/' . $filename));

        $c = Club::find($id);

        $c->suburb_id = $r->suburb_id;
        $c->name = $r->name;
        $c->address = $r->address;
        $c->description = $r->description;
        $c->order = $r->order;
        $c->phone = $r->phone;
        $c->email = $r->email;
        $c->open = $r->days;
        $c->facebook = $r->facebook;
        $c->instagram = $r->instagram;
        $c->cover_photo = $filename;

        $c->save();

        Session::flash('success' , 'Club Edited successfully');
        return redirect()->route('club.show');


    }

}
