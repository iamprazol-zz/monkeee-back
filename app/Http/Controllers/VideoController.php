<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Video;
use Image;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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

        $time = Carbon::now()->format('H:i:s');

        $today = Carbon::today();

        $yesterday = Carbon::yesterday();

        $tomorrow = Carbon::tomorrow();

        $livetoday = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $livetomorrow = Event::where('opening_date', $today)->where('opening', '<', $time)->where('closing_date','>=', $tomorrow)
            ->orderBy('opening', 'asc')
            ->get();

        $liveyesterday = Event::where('opening_date', $yesterday)->where('closing_date', $today)->where('closing', '>', $time)
            ->orderBy('opening', 'asc')
            ->get();

        $livefrommany = Event::where('opening_date','<', $yesterday)->where('closing_date', $today)->where('closing','>',$time)
            ->orderBy('opening', 'asc')
            ->get();

        $liveformany = Event::where('opening_date','<=', $yesterday)->where('closing_date','>', $today)
            ->orderBy('opening', 'asc')
            ->get();

        $event = $livetoday->merge($livetomorrow)->merge($liveyesterday)->merge($livefrommany)->merge($liveformany)->sortBy('opening')->sortBy('opening_date');

        return view('video.create')->with('events', $event);

    }

    public function store(){

        $r = request();


        $this->validate($r, [
            'pic'  => 'max:51200| mimes:mp4,mov,ogg'
        ], [
            'pic.max' => 'The video size must be less than 50 mb',
            'pic.mimes' => 'The video must be of mp4,mov and ogg type',
        ]);

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
