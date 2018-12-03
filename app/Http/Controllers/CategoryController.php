<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Event;
use App\dj;
use App\Video;
use Carbon\Carbon;
use Session;
use App\Http\Resources\Event as EventResource;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{

    public function index(){

        $category = Category::paginate(15);

        $num = $category->count();

        $data = CategoryResource::collection($category);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All categories are listed');

        } else {

            return $this->responser($data,404,'Categories not found');
        }

    }

    public function showById($id){

        $category = Category::where('id' , $id)->get();

        $num = $category->count();

        $c = CategoryResource::collection($category);

        $e = $this->showByCategory($id);

        $data = [
            ['category' => $c ,
                'events' => $e
            ]
        ];

        if ($num > 0) {

            return $this->responser($data , 200 , 'Category with specific id is found');

        } else {

            return $this->responser($c,404,'Category with specific id is not found');
        }
    }

    public function showByCategory($id)
    {

        $today = Carbon::today();

        $event = Event::where('category_id', $id)->where('date', '>=', $today)
            ->get();

        $num = $event->count();

        $data = EventResource::collection($event);

        if ($num > 0) {

            return $this->responser($data , 200 , 'All Event in specified category are listed');

        } else {

            return $this->responser($data,404,'Events in the specified category not found');
        }
    }

    public function show(Request $r){

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
        return redirect()->route('category.show');

    }

    public function destroy($id){

        $category = Category::where('id', $id);

        $event = Event::where('category_id', $id);

        $events = Event::where('category_id', $id)->get();

        $djs = dj::where('category_id', $id);

        $category->delete();

        $event->delete();

        $djs->delete();

        foreach ($events as $e){

            $video = Video::where('event_id', $e->id);

            $video->delete();

        }

        Session::flash('success', 'Category and its associated djs, events and videos has been deleted successfully');

        return redirect()->route('category.show');

    }

}
