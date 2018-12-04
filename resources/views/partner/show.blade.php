@extends('layouts.app')

@section('content')
    <div class="card sm-hidden">

        <h4 class="card-header">
            Partners
        </h4>

        <div class="card-body">

            <div class="col-md-12 ">

            <form action="{{ route('partner.search') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="category_id">Club : </label>
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

            <button class="btn btn-sm btn-outline-primary "> Total Partners: &nbsp;&nbsp;<span class="badge-pill badge-outline-dark">{{ $partners->count() }}</span></button>&nbsp;&nbsp;
            <a href="{{ route('partner.create') }}" class="btn btn-sm btn-primary btn-pill ">Add Partner</a>
                <a href="{{ route('partner.views') }}" class="btn btn-sm btn-black btn-pill ">Most Viewed</a>

                <table class="table table-sm table-hover">
                    <thead class="thead-light">

                    <th>
                        Partner Name
                    </th>

                    <th>
                         Suburb
                    </th>

                    <th>
                        Category
                    </th>

                    <th>
                        Address
                    </th>

                    <th>
                        Description
                    </th>

                    <th>
                        Cover photo
                    </th>

                    <th>
                        Mobile
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Facebook
                    </th>

                    <th>
                        Instagram
                    </th>

                    <th>
                        Website
                    </th>

                    <th>
                        Opened By
                    </th>

                    <th>
                        Option
                    </th>


                    </thead>

                    <tbody style="width: 100%;">
                    @foreach($partners as $partner)
                            <tr>

                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->suburb->name }}</td>
                                <td>{{ $partner->partnercategory->name }}</td>
                                <td>{{ $partner->address}}</td>
                                <td>{{ $partner->description }}</td>
                                <td><div class="card-img"><img src="/images/{{ $partner->cover_photo }}" style="width:80px; height:80px;"/></div></td>
                                <td>{{ $partner->mobile }}</td>
                                <td>{{ $partner->email }}</td>
                                <td>{{ $partner->facebook }}</td>
                                <td>{{ $partner->instagram }}</td>
                                <td>{{ $partner->website }}</td>
                                <td><span class="badge-pill badge-outline-danger">{{ $partner->count }}</span></td>
                                <td>
                                    <a href="{{ route('partner.delete', ['id' => $partner->id]) }}" class="btn btn-sm btn-danger btn-pill ">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <a href="{{ route('partner.edit', ['id' => $partner->id]) }}" class="btn btn-sm btn-primary btn-pill ">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

                                    @if($partner->is_shown($partner->id))
                                        <a href="{{ route('partner.unshown' , ['id' => $partner->id])  }}" class="btn btn-danger btn-sm btn-pill">UnShow</a>
                                    @else
                                        <a href="{{ route('partner.shown' , ['id' => $partner->id])  }}" class="btn btn-info btn-sm btn-pill">Show</a>
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
    </div>







@endsection