@extends('home')

@section('content')

    <div class="col-md-12">
        <div class="card sm-hidden">

            <h4 class="card-header">
                Categories
            </h4>

            <div class="card-body">


                <form action="{{ route('category.index') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-10 justify-content-center">
                            <div class="form-group text-center">
                                <label for="category">Category Name : </label>
                                <input type="text" name="category"  class="form-control d-flex ml-auto mr-auto" id="category">
                            </div>
                        </div>

                        <input class="btn btn-sm btn-primary btn-pill d-flex ml-auto mr-auto" type="submit" value="Search" style="height: 5%; margin-top: 3.5%;">
                </form>
            </div>

            <hr>

            <button class="btn btn-sm btn-outline-primary "> Total Categories: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $categories->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Category</a>

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
                            <td><a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a></td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>



            </div>





        </div>
    </div>
    </div>








@endsection