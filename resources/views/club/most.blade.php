@extends('layouts.app')

@section('content')
<div class="card sm-hidden">

    <h4 class="card-header">
        Clubs
    </h4>

    <div class="card-body">


        <form action="{{ route('club.search') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="suburb_id">Suburb : </label>
                        <select name="suburb_id" class="custom-select" id="suburb_id">
                            @foreach($suburbs as $suburb)
                            <option value="{{ $suburb->id }}">{{ $suburb->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="club">Club Name : </label>
                        <input type="text" name="club"  class="form-control" id="club">
                    </div>
                </div>

            </div>



            <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search">


        </form>
        <hr>

        <button class="btn btn-sm btn-outline-primary "> Total Clubs: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $clubs->count() }}</span></button>&nbsp;&nbsp;
        <a href="{{ route('club.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Club</a>
        <a href="{{ route('club.show') }}" class="btn btn-sm btn-black btn-pill ">All Clubs</a>


        <div class="card-body">

                <table class="table table-hover">
                    <thead class="thead-light">
                    <th>
                        Club Name
                    </th>

                    <th>
                        Views
                    </th>

                    </thead>

                    <tbody>
                    @foreach($clubs as $club)
                    <tr>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->count }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>









@endsection