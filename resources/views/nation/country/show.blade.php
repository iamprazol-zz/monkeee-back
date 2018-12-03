@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Countries
            </h4>

            <div class="card-body">


                <form action="{{ route('country.show') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-10 justify-content-center">
                            <div class="form-group text-center">
                                <label for="country">Country Name : </label>
                                <input type="text" name="country"  class="form-control d-flex ml-auto mr-auto" id="country">
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Countries: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $countries->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('country.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Country</a>

            <div class="card-body">

                <table class="table table-hover">
                    <thead class="thead-light">


                    <th>
                        Name
                    </th>

                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody>
                    @foreach($countries as $country)
                        <tr>

                            <td>{{ $country->name }}</td>
                            <td><a href="{{ route('country.delete', ['id' => $country->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('country.edit', ['id' => $country->id]) }}" class="btn btn-sm btn-primary btn-pill ">Edit</a>
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