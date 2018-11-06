@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Suburbs
            </h4>

            <div class="card-body">


                <form action="{{ route('suburb.index') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-10 justify-content-center">
                            <div class="form-group text-center">
                                <label for="suburb">Suburb Name : </label>
                                <input type="text" name="suburb"  class="form-control d-flex ml-auto mr-auto" id="suburb">
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

                <hr>

                <button class="btn btn-sm btn-outline-primary "> Total Suburbs: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $suburbs->count() }}</span></button>&nbsp;&nbsp;
                <a href="{{ route('suburb.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Suburb</a>

                <div class="card-body">

                    <table class="table table-hover">
                        <thead class="thead-light">


                        <th>
                            Name
                        </th>

                        <th>
                            Postal code
                        </th>


                        </thead>

                        <tbody>
                        @foreach($suburbs as $suburb)
                            <tr>

                                <td>{{ $suburb->name }}</td>
                                <td>{{ $suburb->postalcode }}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>



                </div>





            </div>
        </div>
    </div>








@endsection