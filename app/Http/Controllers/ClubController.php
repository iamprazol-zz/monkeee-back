<?php

namespace App\Http\Controllers;

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

        $g = $this->galleryByClub($id);

        $data = [
            ['club' => $c ,
                'events' => $e ,
                'gallery' => $g
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

    public function galleryByClub($id){

        $gallery = Club_gallery::where('club_id' , $id)->get();

        $num = $gallery->count();

        $data = ClubGalleryResource::collection($gallery);
        if ($num > 0) {

            return $this->responser($data , 200 , 'All pictures clubs are listed');

        } else {

            return $this->responser($data,404,'Pictures of the Club not found');
        }
    }

    public function show(){

        $club = Club::orderBy('id', 'asc')->get();

        $suburb = Suburb::all();

        return view('club.show')->with('clubs', $club)->with('suburbs', $suburb);
    }

    public function search(Request $r){

        $id = $r->suburb_id;

        $club = Club::orderBy('id', 'asc')->where('suburb_id', $id)->where('name' ,'like' , '%'.$r->get('club').'%')->get();

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
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
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
            'opening_time' => Carbon::parse($r->opening)->format('H:i:s'),
            'closing_time' => Carbon::parse($r->closing)->format('H:i:s'),
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

        $club->delete();

        Session::flash('success', 'Club Has Been Deleted Successfully');

        return redirect()->route('club.show');

    }

}
