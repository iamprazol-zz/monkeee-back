@extends('home')

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

                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead class="thead-light">


                        <th>
                           Club Name
                        </th>

                        <th>
                            Suburb
                        </th>

                        <th>
                            Address
                        </th>

                        <th>
                            Description
                        </th>

                        <th>
                            Cover Pic
                        </th>

                        <th>
                            Order
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Opening time
                        </th>

                        <th>
                            Closing time
                        </th>

                        <th>
                            Open
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
                        @foreach($clubs as $club)
                            <tr>

                                <td>{{ $club->name }}</td>
                                <td>{{ $club->suburb->name }}</td>
                                <td>{{ $club->address }}</td>
                                <td>{{ $club->description }}</td>
                                <td><div class="card-img"><img src="/images/{{ $club->cover_photo }}" style="width:150px; height:150px;"/></div></td>
                                <td>{{ $club->order }}</td>
                                <td>{{ $club->phone }}</td>
                                <td>{{ $club->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($club->opening_time)->format('g:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($club->closing_time)->format('g:i A') }}</td>
                                <td>{{ $club->open }}</td>
                                <td>{{ $club->facebook }}</td>
                                <td>{{ $club->instagram }}</td>
                                <td>
                                    <a href="{{ route('club.delete', ['id' => $club->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;
                                    <hr>
                                    @if($club->is_shown($club->id))
                                        <a href="{{ route('club.unshown' , ['id' => $club->id])  }}" class="btn btn-danger btn-sm btn-pill">UnShow</a>
                                    @else
                                        <a href="{{ route('club.shown' , ['id' => $club->id])  }}" class="btn btn-info btn-sm btn-pill">Show</a>
                                    @endif
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