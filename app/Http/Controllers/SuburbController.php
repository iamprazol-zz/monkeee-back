<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suburb;
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

        $suburb->delete();

        Session::flash('success', 'Suburb Has Been Deleted Successfully');

        return redirect()->route('suburb.index');

    }


}
?>