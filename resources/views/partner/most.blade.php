@extends('layouts.app')

@section('content')
    <div class="card sm-hidden">

        <h4 class="card-header">
            Partners
        </h4>

        <div class="card-body">

            <div class="col-md-12 pull-right">

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
                <a href="{{ route('partner.show') }}" class="btn btn-sm btn-black btn-pill ">All Partners</a>


                <div class="card-body">

                    <table class="table table-hover">
                        <thead class="thead-light">
                        <th>
                            Partner Name
                        </th>

                        <th>
                            Views
                        </th>

                        </thead>

                        <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>









@endsection