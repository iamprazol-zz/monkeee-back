<?php

namespace App\Http\Controllers;

use App\partnercategory;
use Illuminate\Http\Request;
use App\partner;
use App\Suburb;
use Image;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\partner as partnerResources;

class PartnerController extends Controller
{

    public function index(){

        $partner = partner::orderBy('name', 'asc')->where('show', 1)->get();

        $num = $partner->count();

        $data = partnerResources::collection($partner);

        if ($num > 0) {

            return $this->responser($data, 200, 'All Partners are listed');

        } else {

            return $this->responser($data, 404, 'Partners not found');
        }

    }

    public function showById($id){

        $partner = partner::where('id', $id)->where('show', 1)->orderBy('name', 'asc')->get();

        $num = $partner->count();

        $data = partnerResources::collection($partner);

        if ($num > 0) {

            return $this->responser($data, 200, 'All Partners in specified category are listed');

        } else {

            return $this->responser($data, 404, 'Partners in specified category not found');
        }
    }

    public function show(){

        $partner = partner::orderBy('name', 'asc')->get();

        $category = partnercategory::all();

        return view('partner.show')->with('partners', $partner)->with('categories', $category);

    }

    public function search(Request $r){

        $id = $r->category_id;

        $partner = partner::where('id', $id)->orderBy('name', 'asc')->get();

        $category = partnercategory::all();

        return view('partner.show')->with('partners', $partner)->with('categories', $category);
    }

    public function create(){

        $category = partnercategory::all();

        $partner = partner::all();

        $suburb = Suburb::all();

        return view('partner.create')->with('partners', $partner)->with('categories', $category)->with('suburbs', $suburb);
    }

    public function store(){

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'pic' => 'required|max:15360',
        ]);

        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/' . $filename);
        Image::make($file)->save($path);

        $partner = partner::create([
            'name' => $r->name,
            'suburb_id' => $r->suburb_id,
            'partnercategory_id' => $r->category_id,
            'address' => $r->address,
            'description' => $r->description,
            'email' => $r->email,
            'mobile' => $r->mobile,
            'website' => $r->website,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'cover_photo' => $filename,

        ]);

        Session::flash('success', 'Partner added successfully');
        return redirect()->route('partner.show');


    }

    public function edit($id){

        $partner = partner::where('id', $id)->first();

        $suburb = Suburb::all();

        $category = partnercategory::all();

        return view('partner.edit')->with('partners', $partner)->with('categories', $category)->with('suburbs', $suburb);

    }

    public function update($id){

        $r = request();

        $this->validate($r, [
            'name' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'pic' => 'required|max:15360',
        ]);

        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/' . $filename);
        Image::make($file)->save($path);

        $partner = partner::find($id);
        $partner->name = $r->name;
        $partner->suburb_id = $r->suburb_id;
        $partner->partnercategory_id = $r->category_id;
        $partner->address = $r->address;
        $partner->description = $r->description;
        $partner->email = $r->email;
        $partner->mobile = $r->mobile;
        $partner->website = $r->website;
        $partner->facebook = $r->facebook;
        $partner->instagram = $r->instagram;
        $partner->cover_photo = $filename;

        $partner->save();

        Session::flash('success', 'Partner edited successfully');
        return redirect()->route('partner.show');

    }

    public function destroy($id){

        $partner = partner::find($id);

        $partner->delete();

        Session::flash('success', 'Partner deleted successfully');
        return redirect()->route('partner.show');

    }

    public function shown($id){

        $ad = partner::where('id' , $id)->first();

        $ad->show = 1 ;

        $ad->save();

        Session::flash('success' , 'The partner is set to shown successfully');

        return redirect()->back();

    }

    public function unshown($id){

        $ad = partner::where('id' , $id)->first();

        $ad->show = 0 ;

        $ad->save();

        Session::flash('success' , 'The partner is set to unshown successfully');

        return redirect()->back();

    }

}
