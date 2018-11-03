<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dj;
use App\Category;
use Image;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\dj as djResource;

class DjController extends Controller
{

    public function index(){

        $dj = dj::where('show', 1)->get();

        $num = $dj->count();

        $data = djResource::collection($dj);

        if($num > 0){

            return $this->responser($data, 200, 'All djs are listed');

        } else {

            return $this->responser($data, 404, 'No djs found');

        }

    }

    public function showById($id){

        $dj = dj::where('id', $id)->where('show', 1)->get();

        $num = $dj->count();

        $data = djResource::collection($dj);

        if($num > 0){

            return $this->responser($data, 200, 'The Specified dj is found');

        } else {

            return $this->responser($data, 404, ' The Specified dj is not found');

        }

    }

    public function show(){

        $dj = dj::orderBy('name', 'asc')->get();

        $category = Category::all();

        return view('dj.show')->with('djs', $dj)->with('categories', $category);
    }

    public function search(Request $r){

        $id = $r->category_id;

        $dj = dj::orderBy('name', 'asc')->where('category_id', $id)->get();

        $category = Category::all();

        return view('dj.show')->with('djs', $dj)->with('categories', $category);

    }

    public function destroy($id){

        $dj = dj::where('id', $id);

        $dj->delete();

        Session::flash('success', 'Dj Has Been Deleted Successfully');

        return redirect()->route('dj.show');

    }

    public function create() {

        $category = Category::all();

        return view('dj.create')->with('categories', $category);

    }

    public function store(){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
            'resident' => 'required|string|min:2|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
        ]);


        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/images/'. $filename);
        Image::make($file)->save($path);

        $dj = dj::create([
            'name' => $r->name,
            'category_id' => $r->category_id,
            'resident' => $r->resident,
            'label' => $r->label,
            'mobile' => $r->phone,
            'email' => $r->email,
            'bio' => $r->description,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'picture' => $filename,

        ]);

        Session::flash('success' , 'Dj added successfully');
        return redirect()->route('dj.show');

    }

    public function shown($id){

        $dj = dj::where('id' , $id)->first();

        $dj->show = 1 ;

        $dj->save();

        Session::flash('success' , 'The dj is set to shown successfully');

        return redirect()->back();

    }

    public function unshown($id){

        $dj = dj::where('id' , $id)->first();

        $dj->show = 0 ;

        $dj->save();

        Session::flash('success' , 'The dj is set to unshown successfully');

        return redirect()->back();

    }

}
