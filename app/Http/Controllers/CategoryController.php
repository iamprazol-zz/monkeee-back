<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{


    public function index(Request $r){

        $category = Category::orderBy('id', 'asc')->where('name' ,'like' , '%'.$r->get('category').'%')->get();

        return view('category.index')->with('categories', $category);
    }

    public function create() {

        return view('category.create');

    }

    public function store(){
        $r = request();
        $this->validate($r ,[
            'name' => 'required|string|min:2|max:255',
        ]);

        $req = Category::create([
            'name' => $r->name,
        ]);

        Session::flash('success' , 'Category added successfully');
        return redirect()->route('category.index');

    }

    public function destroy($id){

        $category = Category::where('id', $id);

        $category->delete();

        Session::flash('success', 'Category Has Been Deleted Successfully');

        return redirect()->route('category.index');

    }

}
