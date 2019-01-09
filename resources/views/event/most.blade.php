@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Most Viewed Events
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
                <a href="{{ route('event.show') }}" class="btn btn-sm btn-black btn-pill ">All Events</a>

                <div class="card-body">

                    <table class="table table-hover">
                        <thead class="thead-light">
                        <th>
                            Event Name
                        </th>

                        <th>
                            Views
                        </th>

                        </thead>

                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









@endsection