@extends('layouts.app')

@section('content')
    <div class="card sm-hidden">

        <h4 class="card-header">
            Events
        </h4>

        <div class="card-body">


            <form action="{{ route('event.search') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="club_id">Club : </label>
                            <select name="club_id" class="custom-select" id="club_id">
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>



                <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search">


            </form>
            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Events: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $events->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Event</a>
            <a href="{{ route('event.views') }}" class="btn btn-sm btn-black btn-pill ">Most Viewed</a>


            <div class="card-body">

                <table class="table table-sm table-hover">
                    <thead class="thead-light">

                    <th>
                        Event Name
                    </th>

                    <th>
                        Club Name
                    </th>

                    <th>
                        Category
                    </th>

                    <th>
                        Opening Date
                    </th>

                    <th>
                        Opening
                    </th>

                    <th>
                        Closing Date
                    </th>

                    <th>
                        Closing
                    </th>

                    <th>
                        Picture
                    </th>

                    <th>
                        Description
                    </th>

                    <th>
                        Price
                    </th>

                    <th>
                        Ticket Link
                    </th>

                    <th>
                        Facebook
                    </th>

                    <th>
                        Instagram
                    </th>

                    <th>
                        Opened By
                    </th>

                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody style="width: 100%;">
                    @foreach($events as $event)
                        @if($event->club->show == 1)
                        <tr>

                            <td>{{ $event->name }}</td>
                            <td>{{ $event->club->name }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td>{{ $event->opening_date }}</td>
                            <td>{{ $event->opening }}</td>
                            <td>{{ $event->closing_date }}</td>
                            <td>{{ $event->closing }}</td>
                            <td><div class="card-img"><img src="/images/{{ $event->picture }}" style="width:80px; height:80px;"/></div></td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->price }}</td>
                            <td>{{ $event->ticket_link }}</td>
                            <td>{{ $event->facebook }}</td>
                            <td>{{ $event->instagram }}</td>
                            <td><span class="badge-pill badge-outline-danger">{{ $event->count }}</span></td>
                            <td>
                                <a href="{{ route('event.delete', ['id' => $event->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('event.edit', ['id' => $event->id]) }}" class="btn btn-sm btn-primary btn-pill ">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('event.copy', ['id' => $event->id]) }}" class="btn btn-sm btn-pill " style=" color: white; background-color: lightseagreen">Copy</a>&nbsp;&nbsp;

                            </td>

                        </tr>
                        @endif
                    @endforeach
                    </tbody>

                </table>



            </div>



            <div class="card-footer">

                {{ $events->links() }}

            </div>

        </div>
    </div>
    </div>
    </div>
    </div>







@endsection