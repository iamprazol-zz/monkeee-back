@extends('layouts.app')

@section('content')
    <div class="card sm-hidden">

        <h4 class="card-header">
            Djays
        </h4>

        <div class="card-body">


            <form action="{{ route('dj.search') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="category_id">Category : </label>
                            <select name="category_id" class="custom-select" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>



                <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search">


            </form>
            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Djays: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $djs->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('dj.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Djay</a>

            <div class="card-body">

                <table class="table table-sm table-hover">
                    <thead class="thead-light">

                    <th>
                        Name
                    </th>

                    <th>
                        Category
                    </th>

                    <th>
                        Resident
                    </th>

                    <th>
                        Label
                    </th>

                    <th>
                        Mobile
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Bio
                    </th>

                    <th>
                        Facebook
                    </th>

                    <th>
                        Instagram
                    </th>

                    <th>
                        Picture
                    </th>

                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody>
                    @foreach($djs as $dj)
                        <tr>

                            <td>{{ $dj->name }}</td>
                            <td>{{ $dj->category->name }}</td>
                            <td>{{ $dj->resident }}</td>
                            <td>{{ $dj->label }}</td>
                            <td>{{ $dj->mobile }}</td>
                            <td>{{ $dj->email }}</td>
                            <td>{{ $dj->bio }}</td>
                            <td>{{ $dj->facebook }}</td>
                            <td>{{ $dj->instagram }}</td>
                            <td><div class="card-img"><img src="/images/{{ $dj->picture }}" style="width:100px; height:100px;"/></div></td>

                            <td>
                                <a href="{{ route('dj.delete', ['id' => $dj->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @if($dj->is_shown($dj->id))
                                    <a href="{{ route('dj.unshown' , ['id' => $dj->id])  }}" class="btn btn-danger btn-sm btn-pill">UnShow</a>
                                @else
                                    <a href="{{ route('dj.shown' , ['id' => $dj->id])  }}" class="btn btn-info btn-sm btn-pill">Show</a>
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