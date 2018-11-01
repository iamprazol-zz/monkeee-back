<?php

namespace App\Http\Controllers;

use App\Http\Resources\Club;
use Illuminate\Http\Request;
use App\Club_gallery;

class ClubGalleryController extends Controller
{
    public function showByClub($id){

        $data = Club_gallery::where('club_id' , $id)->get();

        $num = $data->count();

        if ($num > 0) {

            return $this->responser($data , 200 , 'All clubs are listed');

        } else {

            return $this->responser($data,404,'Clubs not found');
        }
    }

    public function sh
}
