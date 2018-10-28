<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Suburb;
use App\Http\Resources\Club as ClubResource;

class ClubController extends Controller
{
    public function index(){

        $clubs = Club::paginate(15);

        $num = $clubs->count();

        $data = ClubResource::collection($clubs);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All clubs are listed');

        } else {

            return $this->responser($data,404,'Clubs not found');
        }

    }

    public function showById($id){

        $club = Club::where('id' , $id)->get();

        $num = $club->count();

        $data = ClubResource::collection($club);

        if ($num > 0) {

            return $this->responser($data , 200 , 'Club with specific id is found');

        } else {

            return $this->responser($data,404,'Club with specific id is not found');
        }
    }

    public function showBySuburb($id){

        $clubs = Club::where('suburb_id' , $id)->get();

        $num = $clubs->count();

        $data = ClubResource::collection($clubs);

        if ($num > 0) {

            return $this->responser($data , 200 , 'Club in specific suburb is found');

        } else {

            return $this->responser($data,404,'Club in specific suburb is not found');
        }
    }
}
