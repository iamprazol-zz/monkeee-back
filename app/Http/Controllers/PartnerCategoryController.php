<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partnercategory;
use App\partner;
use Illuminate\Support\Facades\Session;

class PartnerCategoryController extends Controller
{

    public function show(Request $r){

        $category = partnercategory::orderBy('id', 'asc')->where('name' ,'like' , '%'.$r->get('category').'%')->get();

        return view('partnercat.show')->with('categories', $category);

    }

    public function create(){

        $category = partnercategory::all();

        return view('partnercat.create')->with('categories', $category);

    }

    public function store(){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
        ]);

        $req = partnercategory::create([
            'name' => $r->name,
        ]);

        Session::flash('success' , 'Partner Category added successfully');
        return redirect()->route('partnercat.show');
    }

    public function destroy($id){

        $category = partnercategory::where('id', $id);

        $partner = partner::where('partnercategory_id', $id);

        $category->delete();

        $partner->delete();

        Session::flash('success' , 'Partner Category deleted successfully');
        return redirect()->route('partnercat.show');

    }

    public function edit($id){

        $category = partnercategory::where('id', $id)->first();

        return view('partnercat.edit')->with('categories', $category);

    }

    public function update($id){

        $r = request();

        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
        ]);

        $req = partnercategory::find($id);
        $req->name = $r->name;

        $req->save();

        Session::flash('success' , 'Partner Category edited successfully');
        return redirect()->route('partnercat.show');
    }
}
