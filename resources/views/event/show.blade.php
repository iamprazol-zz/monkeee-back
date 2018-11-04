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
                        Date
                    </th>

                    <th>
                        Opening
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
                        Option
                    </th>


                    </thead>

                    <tbody>
                    @foreach($events as $event)
                        <tr>

                            <td>{{ $event->name }}</td>
                            <td>{{ $event->club->name }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->opening }}</td>
                            <td>{{ $event->closing }}</td>
                            <td><div class="card-img"><img src="/images/{{ $event->picture }}" style="width:150px; height:150px;"/></div></td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->price }}</td>
                            <td>{{ $event->ticket_link }}</td>
                            <td>{{ $event->facebook }}</td>
                            <td>{{ $event->instagram }}</td>
                            <td>
                                <a href="{{ route('event.delete', ['id' => $event->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>
    </div>
    </div>







@endsection