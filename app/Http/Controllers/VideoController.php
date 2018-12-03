<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Video;
use Image;
use Validator;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{

    public function show(){

        $video = Video::orderBy('video', 'asc')->get();

        $event = Event::all();

        return view('video.show')->with('videos', $video)->with('events', $event);

    }

    public function search(){

        $r = request();

        $id = $r->event_id;

        $video = Video::where('event_id', $id)->get();

        $event = Event::all();

        return view('video.show')->with('videos', $video)->with('events', $event);

    }

    public function create(){

        $event = Event::all();

        return view('video.create')->with('events', $event);

    }

    public function store(){

        $r = request();


        $this->validate($r, [
            'pic'  => 'mimes:mp4,mov,ogg | max: 20480'
        ], [
            'pic.mimes' => 'The video must be of mp4,mov and ogg type',
            'pic.max' => 'The video size must be less than 20 mb'
        ]);

        $validator = Validator::make($r->all(), [
            'pic' => 'video_length:60', // 60 max video length in second
        ], [
            'pic.video_length' => 'The video length must be less than 1 minute'
        ]);

        if ($validator->fails()) {
            return redirect('video/create')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $r->file('pic');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('images/videos/');

        $file->move($path, $filename);

        Video::create([
            'event_id' => $r->event_id,
            'video' => $filename
        ]);

        Session::flash('success', 'Video has been added successfully');
        return redirect()->route('video.show');
    }

    public function destroy($id){

        $video = Video::find($id);

        $video->delete();

        Session::flash('success', 'Video has been deleted successfully');
        return redirect()->route('video.show');

    }

}
