@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Cities
            </h4>

            <div class="card-body">


                <form action="{{ route('city.search') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="country_id">Country : </label>
                                <select name="country_id" class="custom-select" id="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="city">City Name : </label>
                                <input type="text" name="city"  class="form-control" id="city">
                            </div>
                        </div>

                    </div>
                    <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search">

                </form>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Cities: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $cities->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('city.create') }}" class="btn btn-sm btn-primary btn-pill ">Add City</a>

            <div class="card-body">

                <table class="table table-hover">
                    <thead class="thead-light">


                    <th>
                        Country Name
                    </th>

                    <th>
                        Time Zone
                    </th>

                    <th>
                        City Name
                    </th>

                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->country->name }}</td>
                            <td>{{ $city->zone->name }}</td>
                            <td>{{ $city->name }}</td>
                            <td><a href="{{ route('city.delete', ['id' => $city->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('city.edit', ['id' => $city->id]) }}" class="btn btn-sm btn-primary btn-pill ">Edit</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>








@endsection