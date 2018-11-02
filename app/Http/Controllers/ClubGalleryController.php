<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club_gallery;
use App\Club;
use Image;
use Illuminate\Support\Facades\Session;

class ClubGalleryController extends Controller
{
    public function showByClub($id){

        $data = Club_gallery::where('club_id' , $id)->get();

        $num = $data->count();

        if ($num > 0) {

            return $this->responser($data , 200 , 'All pictures clubs are listed');

        } else {

            return $this->responser($data,404,'Pictures of the Club not found');
        }
    }

    public function show(Request $r){

        $id = $r->club_id;

        $gallery = Club_gallery::where('club_id', $id)->get();

        $club = Club::all();

        return view('gallery.show')->with('galleries', $gallery)->with('clubs' , $club);
    }

    public function create() {

        $club = Club::all();

        return view('gallery.create')->with('clubs' , $club);

    }

    public function store(){

        $r = request();

        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/'. $filename);
        Image::make($file)->save($path);

        $event = Club_gallery::create([
            'club_id' => $r->club_id,
            'description' => $r->description,
            'picture' => $filename,
        ]);

        Session::flash('success' , 'Pic added successfully');
        return redirect()->route('gallery.show', ['id' => $r->club_id]);

    }

    public function destroy($id){

        $gallery = Club_gallery::where('id', $id);

        $gallery->delete();

        Session::flash('success', 'The Selected Pic  Has Been Deleted Successfully');

        return redirect()->route('gallery.show');

    }
}
