@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Videos
            </h4>

            <div class="card-body">


                <form action="{{ route('video.search') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="event_id">Event : </label>
                                <select name="event_id" class="custom-select" id="event_id">
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Videos: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $videos->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('video.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Video</a>

            <div class="card-body">

                <table class="table table-hover">
                    <thead class="thead-light">

                    <th>
                        Event Name
                    </th>

                    <th>
                        Video
                    </th>


                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->event->name }}</td>
                            <td><video width="250" height="200" controls preload="none">
                                    <source src="images/videos/{{ $video->video }}"  type="video/mp4" />
                                    <source src="images/videos/{{ $video->video }}"  type="video/ogg" />
                                </video>
                            </td>
                            <td><a href="{{ route('video.delete', ['id' => $video->id]) }}" class="btn btn-danger btn-sm btn-pill">Delete</a>
                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>








@endsection