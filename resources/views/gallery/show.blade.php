@extends('home')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Gallery
            </h4>

            <div class="card-body">


                <form action="{{ route('gallery.show') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-10 justify-content-center">
                            <div class="form-group text-center">
                                <label for="club_id">Club : </label>
                                <select name="club_id" class="custom-select" id="club_id">
                                    @foreach($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Pictures: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $galleries->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Gallery</a>

            <div class="card-body">

                <table class="table table-hover">
                    <thead class="thead-light">

                    <th>
                        Name
                    </th>

                    <th>
                        Picture
                    </th>

                    <th>
                        Description
                    </th>

                    <th>
                        Option
                    </th>

                    </thead>

                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>

                            <td>{{ $gallery->club->name }}</td>
                            <td><div class="card-img"><img src="{{ $gallery->picture }}" style="width:150px; height:150px;"/></div></td>
                            <td>{{ $gallery->description }}</td>
                            <td><a href="{{ route('gallery.delete', ['id' => $gallery->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a></td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>








@endsection