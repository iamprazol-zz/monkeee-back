@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Partner Categories
            </h4>

            <div class="card-body">

                <div class="card-body">

                    <div class="col-md-3 pull-left">

                        <h4 class="card-header">
                            Select
                        </h4>

                        <ul class="list-group">

                            <li class="list-group-item"><a href="{{ route('partner.show') }}">Partners</a></li>
                            <li class="list-group-item"><a href="{{ route('partnercat.show') }}">Partner Category</a></li>


                        </ul>

                    </div>

                    <div class="col-md-9 pull-right">


                <form action="{{ route('partnercat.show') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-10 justify-content-center">
                            <div class="form-group text-center">
                                <label for="category">Partner Category Name : </label>
                                <input type="text" name="category"  class="form-control d-flex ml-auto mr-auto" id="category">
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Partner Categories: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $categories->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('partnercat.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Category</a>

            <div class="card-body">

                <table class="table table-sm table-hover" style="border: 2; width: 150%;">
                    <thead class="thead-light">


                    <th>
                        Name
                    </th>

                    <th>
                        Option
                    </th>

                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>

                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('partnercat.delete', ['id' => $category->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>
                            <a href="{{ route('partnercat.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary btn-pill">Edit</a> </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>








@endsection